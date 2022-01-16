<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    public $fillable =[
        'frais',
        'nbre_jour_debut',
        'nbre_jour_fin'
    ];

    public function villes(){
        return $this->hasMany(Ville::class);
    }
    // public function datedebut(){
    //     $offset = $this->nbre_jour_debut; 
    //     $strtotim = strtotime("+$offset day", strtotime('2021-12-22'));
    //     $ladate = getdate($strtotim);
    //     return $ladate['mday']." ". "  ". $ladate['wday'].", " ." "." ".$ladate['mon'];
    // }


}
