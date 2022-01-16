<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'etat',
    ];
    public $timestamps =false;
    public function produits(){
        return $this->belongsToMany(Produit::class);
    }

    public function descript(){
        return $this->hasMany('App\Models\Description','taille_id','id');
    }
}
