<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Souscategorie;
use App\Models\Produit;
use App\Models\Panier;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class PageController extends Controller
{
    //
    public function acceuil(){
        $data['sub_title'] ='Bienvenue sur votre boutique de reference';
        $data['categories'] = Categorie::all();
        //$data['prod_is_wishlists'] = Wishlist::where('adresse_ip',$this->adresse_ip())->pluck('produit_id')->toArray();
        $data['produits'] = Produit::all();
        
        return view('client.home', $data);
    }

    public function select_par_souscat(Souscategorie $souscategorie){
        $data['sub_title'] ='Liste des produit de la categorie '.$souscategorie->libelle;
        $data['produits'] = Produit::where('souscategory_id', $souscategorie->id)->orderBy('id', 'desc')->paginate(12);
        $data['souscategorie_current'] = $souscategorie;
        $data['souscategories'] = $souscategorie->categorie->souscategorie;
        $data['categories'] = Categorie::all();
         
        //$data['prod_is_wishlists'] = Wishlist::where('adresse_ip',$this->adresse_ip())->pluck('produit_id')->toArray();
        // $data['tailles'] = Taille::whereHas('produits',function ($query) use ($categorie){
        //     $query->where('produits.category_id',$categorie->id);
        // })->inRandomOrder()->get();

        // $data['couleurs'] = Couleur::whereHas('produits',function ($query) use ($categorie){
        //     $query->where('produits.category_id',$categorie->id);
        // })->inRandomOrder()->get();

        return view('client.page.productByCategory',$data);
    }


}
