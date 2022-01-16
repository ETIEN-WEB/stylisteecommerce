<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'icon',
        'image',
        'position',
    ];

    public $timestamps =false;

    public function souscategorie(){
        return $this->hasMany('App\Models\Souscategorie','category_id','id');
    }
}
