<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    public $fillable =[
        'user_id',
        'ville_id',
        'first_name',
        'name',
        'contact1',
        'contact2',
        'adresse_detail',
        'info_suplementaire',
        'current_adresse'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ville(){
        return $this->belongsTo(Ville::class);
    }

}
