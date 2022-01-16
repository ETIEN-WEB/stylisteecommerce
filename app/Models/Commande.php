<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'soustotal',
        'ville_livraison',
        'frais',

        'contact1',
        'contact2',
        'adresse_detail',
        'info_suplementaire',

        'datecommande',
        'modepaiement',
        'status',
        'livraisondatedebut',
        'livraisondatefin',
    ];
    public $timestamps =false;

    public function user(){
        return $this->belongsTo(User::class);
    }

   public function descriptions(){
       return $this->belongsToMany(Description::class)->withPivot('prix','quantite','taille');
   }
   public function nbproduit(){
    return $this->descriptions()->sum('quantite');
   }


   
}
