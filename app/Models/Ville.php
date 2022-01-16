<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    public $fillable =[
        'type_ville_id',
        'livraison_id',
        'libelle'
    ];

    public function type_ville(){
        return $this->belongsTo(Type_ville::class);
    }

    public function livraison(){
        return $this->belongsTo(Livraison::class);
    }

    public function adresse(){
        return $this->belongsTo(Adresse::class);
    }

}
