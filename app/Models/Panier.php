<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'adresse_ip',
        'taille',
        'prix',
        'quantite',
        'soustotal',
    ];
    public $timestamps =false;
    public function produit(){
        return $this->belongsTo(Produit::class);
    }

    public function price(){
        //$price= $this->description()->first();
        $le_prix = strrev(wordwrap(strrev($this->prix), 3, '.', true));
            return $le_prix;
    }
    public function subprice(){
        $le_prix = strrev(wordwrap(strrev($this->soustotal), 3, '.', true));
            return $le_prix;
    }
   
    

    


    

    

    

    /*public function totalPanier(){

        return number_format($this->quantite * $this->descriptionproduit()->first()->prix,2,',','.');
    }*/
}
