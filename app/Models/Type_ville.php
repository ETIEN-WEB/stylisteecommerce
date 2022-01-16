<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_ville extends Model
{
    use HasFactory;
    public $fillable =[
        'libelle'
    ];

    public function villes(){
        return $this->hasMany(Ville::class);
    }


}
