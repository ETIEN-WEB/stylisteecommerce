<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Taille;
use App\Models\Matiere;
use App\Models\Garantie;
use App\Models\Souscategorie;
use App\Models\Produit;
use App\Models\Description;
use App\Models\Image;
use App\Models\Panier;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class ProduitController extends Controller
{
    
    public function create(){
        $data['sub_title'] = "Creation d'un produit";
        $data['categories'] = Categorie::all();
        $data['tailles'] = Taille::all();
        $data['matieres'] = Matiere::all();
        $data['garanties'] = Garantie::all();
        return view('admin.product.create', $data);
    }
    
    public function findsouscategorie(Request $request){
        //dd($request->id);
        $val_souscategorie = Souscategorie::select('libelle', 'id')->where('category_id', $request->id)->take(100)->get();
        //dd($val_souscategorie);
        return response()->json($val_souscategorie);
    }

    public function store(Request $request){
        $this->validate($request,[
            'libelle'=>'required',
            'categorie'=>'required',
            'souscategory_id'=>'required',
            'garantie_id'=>'required',
            'description'=>'required',
            'etat'=>'required',
            'matiere_id'=>'required',
            'fileUpload'=>'required',
        ]);

        $produit = new Produit();
        $produit->libelle = htmlspecialchars($request->libelle);
        $produit->souscategory_id = htmlspecialchars($request->souscategory_id);
        $produit->garantie_id = htmlspecialchars($request->garantie_id);
        $produit->detail = htmlspecialchars($request->description);
        $produit->etat = htmlspecialchars($request->etat);
        $produit->save();
        $produit->matieres()->attach($request->matiere_id);

        foreach ($request->test_field_id as $values) {
            $description = new Description();
            $description->produit_id = $produit->id;
            $description->taille_id = $values['test_sub1'];
            $description->prix = $values['test_sub2'];
            $description->stock = $values['test_sub3'];
            $produit->tailles()->attach($values['test_sub1']);
            $description->save();
        }

        //$nom_produit = str_replace(' ','_',htmlspecialchars($request->libelle));
        $nom_produit = htmlspecialchars($request->libelle);
        foreach ($request->file('fileUpload') as $key => $photo){
            $photoName = time().$key.'_'.'Photo_'.$nom_produit.'.'.$photo->getClientOriginalExtension();
            $destinationPath = 'backend/img-produit/';
            if (File::exists(public_path($destinationPath.$photoName))) {
                $fileName = '2021'.$photoName;
              }else{
                $fileName = $photoName;
              }
              $photo->move(public_path('backend/img-produit'), $fileName);
            Image::create([
                'produit_id'=>$produit->id,
                'libelle'=>$fileName,
            ]);
        }
        Flasher::success('Produit crée avec succès');
        return back();
    }

    public function show(Produit $produit) {
        $data['sub_title'] = "Détail du produit ".$produit->libelle;
        $data['categories'] = Categorie::all();
        $data['produit']=$produit;
        return view('admin.product.show', $data);
    }

    
    public function findproductprice(Request $request, Description $description){
        //dd($description->prix);
        $donne['prix'] = $description->prix;
        return response()->json($donne);
    }

    
    public function ajouter_panier(Request $request, Produit $produit){
        //dd($request->taille, $request->Qte);
        $taille = Taille::where('libelle', $request->taille)->first();
        $desc_produit = $produit->description->where('taille_id', '=', $taille->id)->first();
        $prod_id = $desc_produit->id;
        $quantity = $request->Qte;
        $size = $request->taille;

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    $cart_data[$keys]["item_quantity"] = $request->Qte;
                    $item_data = json_encode($cart_data);
                    $minutes = 2000;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['msg'=>' '.$cart_data[$keys]["item_name"].' '.'a été ajouté avec succès']);

                    //return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
                }
            }
        }
        else
        {
            $products = $produit;
            //dd($products);
            $prod_name = $products->libelle;
            $prod_image = $products->firstImage();
            $priceval = $desc_produit->prix;
            //$prod_id = $;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'prod_size' => $size
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 2000;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['msg'=>' '.$prod_name.' '.'a été ajouté avec succès']);
                //return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }









        // $taille = Taille::where('libelle', $request->taille)->first();
        // $desc_produit = $produit->description->where('taille_id', '=', $taille->id)->first();
       
        // $panier =  Panier::where('produit_id', $produit->id)->where('adresse_ip', Cookie::get('preference', '[]'))->first();
        // if ($panier) {
            
        //     $panier->produit_id = $produit->id;
        //     $panier->adresse_ip = Cookie::get('preference', '[]');
        //     $panier->taille = $request->taille;
        //     $panier->prix = $desc_produit->prix;
        //     $panier->quantite += $request->Qte;
        //     $panier->soustotal = $panier->quantite*$desc_produit->prix;
        //     $panier->save();
        // } else {
        //     $panier = new Panier();
        //     $panier->produit_id = $produit->id;
        //     $panier->adresse_ip = Cookie::get('preference', '[]');
        //     $panier->taille = $request->taille;
        //     $panier->prix = $desc_produit->prix;
        //     $panier->quantite = $request->Qte;
        //     $panier->soustotal = $request->Qte*$desc_produit->prix;
        //     $panier->save();
        // }

        // $paniers = Panier::where('adresse_ip', Cookie::get('preference', '[]'))->get();
        // $nb_aticle = $paniers->sum('quantite');

        // return response()->json(['msg'=>'Produit ajouter avec succès', 'nb_aticle'=>$nb_aticle]);

    }

    


    
















    public function creetail(){
        $arr= [
            'Parfums homme',
            'Parfums femme',
            'Parfums enfant ',
            'Déodorants et Anti-transpirants'
  
      ];
     foreach($arr as $ar){
        Souscategori::create([
          /*'nom_modele'=>$ar,
          'marque_id'=>96,
          'espace_modele'=>'NULL'*/
          'libelle'=>$ar,
          'category_id'=>'8'
      ]);
     }
     echo 'success';
      }




}
