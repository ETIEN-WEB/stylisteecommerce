<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $fillable = [
        'produit_id',
        'taille_id',
        'prixdf',
        'prix',
        'stock',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
    public function taill(){
        return $this->belongsTo('App\Models\Taille','taille_id','id');
    }
    public function commandes(){
        return $this->belongsToMany(Commande::class)->withPivot('prix','quantite','taille');
    }
}
