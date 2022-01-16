<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'category_id',
    ];

    public function produits(){
        return $this->hasMany('App\Models\Produit','souscategory_id','id');
    }

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie','category_id','id');
    }


}
