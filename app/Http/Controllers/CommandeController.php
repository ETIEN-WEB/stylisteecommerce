<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produit;
use App\Models\Type_ville;
use App\Models\Ville;
use App\Models\Adresse;
use App\Models\Commande;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;

class CommandeController extends Controller
{
    //
    private function currentUser(){
        return Auth::guard('web')->user();
    }

        public function index()
    {
        $data['sub_title'] ='Liste des commandes';
        $data['commandes'] = Commande::all();
        return view('admin.orders.index',$data);

    }
    public function show(Commande $commande)
    {
        $data['sub_title'] = 'Détail de la commande N° '.$commande->id;
        $data['user'] =$commande->user;
        $data['commande'] =$commande;
        return  view('admin.orders.show',$data);
    }
    public function checkout(){
        $data['localites'] = Type_ville::all();
        $data['sub_title'] ='Confirmer mon achat';
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        //$cart_data = json_decode($cookie_data, true);
        $data['user'] = $this->currentUser();
        $data['cart_data'] = json_decode($cookie_data, true);
        //dd($cart_data);


        // $adresse =Adresse::where('current_adresse','=',true)->first();
        // if ($adresse->count()>0){
        //     $data['adresse'] =$adresse;
        // }else{
        //     $data['adresse'] = array();
        // }
        return view('client.page.checkout', $data);
    }

    public function store(Request $request){
        if (Session::get('datacommande')) {
            $datacommande = (Session::get('datacommande'));
            Session::forget('datacommande');
            //dd($datacommande['total']);
        }else{
            Flasher::error('Erreur inattendu veuillez ressayer');
            return back();
        }
        
        $validator = Validator::make($request->all(), [
            'ville'=> 'required',
            'type_ville'=> 'required',
            'first_name'=> 'required',
            'name'=> 'required',
            'contact1'=> 'required',
            'contact2'=> 'nullable',
            'adresse_detail'=> 'required',
            'info_suplementaire'=> 'string|min:2|max:255|nullable',
            'current_adresse' => 'nullable',
        ]);
        if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
        }

        $adresse = Adresse::find($request->adresse_id);
        if ($adresse) {
            //Adresse::where('current_adresse','=',true)->update(['current_adresse'=>false]);
            Adresse::where('user_id','=',$this->currentUser()->id)->update(['current_adresse'=>false]);
            $adresse->user_id = $this->currentUser()->id;
            $adresse->first_name = htmlspecialchars($request->first_name);
            $adresse->ville_id = htmlspecialchars($request->ville);
            $adresse->name = htmlspecialchars($request->name);
            $adresse->contact1 = htmlspecialchars($request->contact1);
            $adresse->contact2 = htmlspecialchars($request->contact2);
            $adresse->adresse_detail = htmlspecialchars($request->adresse_detail);
            $adresse->info_suplementaire =htmlspecialchars($request->info_suplementaire);
            $adresse->current_adresse = true;
            $adresse->save();
        } else {
            Adresse::where('user_id','=',$this->currentUser()->id)->update(['current_adresse'=>false]);
            $adresse = Adresse::create([
                'user_id'=>$this->currentUser()->id,
                'first_name'=>htmlspecialchars($request->first_name),
                'ville_id'=>htmlspecialchars($request->ville),
                'name'=>htmlspecialchars($request->name),
                'contact1'=>htmlspecialchars($request->contact1),
                'contact2'=>htmlspecialchars($request->contact2),
                'adresse_detail'=>htmlspecialchars($request->adresse_detail),
                'info_suplementaire'=>htmlspecialchars($request->info_suplementaire),
                'current_adresse'=> true,
            ]);
        }
        //dd($adresse);
        $commande = new Commande();
        $commande->user_id = $this->currentUser()->id;
        $commande->total = $datacommande['total'];
        $commande->soustotal = $datacommande['soustotal'];
        $commande->ville_livraison = $datacommande['villelivraison'];

        $commande->contact1 = $adresse->contact1;
        $commande->contact2 = $adresse->contact2;
        $commande->adresse_detail = $adresse->adresse_detail;
        $commande->info_suplementaire = $adresse->info_suplementaire;

        $commande->frais = $adresse->ville->livraison->frais;
        $commande->datecommande = date_create();
        $commande->modepaiement = htmlspecialchars($request->paymentmethod);
        $commande->status = 1;
        $commande->livraisondatedebut = $this->currentUser()->datedebut();
        $commande->livraisondatefin = $this->currentUser()->datefin();
        //dd($commande);
        if ($commande->save()) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            foreach ($cart_data as $data) {
                $commande->descriptions()->attach($data['item_id'], ['prix' => $data['item_price'],
                    'quantite' => $data['item_quantity'], 'taille'=>$data['prod_size']]);
            }
            Cookie::queue(Cookie::forget('shopping_cart'));
            Flasher::success('Commande effectué avec succès');
            return redirect()->route('acceuil');
        }else{
            Flasher::error('Erreur inattendu veuillez ressayer');
            return back();
        }
        // $commande->total = htmlspecialchars($request->zone_id);
        // $commande->soustotal = htmlspecialchars($request->paymentmethod);
    }






}
