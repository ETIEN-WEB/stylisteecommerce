<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public $fillable=[
        'user_id',
        'produit_id',
        'note',
        'titre',
        'commentaire',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function etoile(){
        $etoile='';
        for($i=1; $i<=round($this->note); $i++){
            $etoile.='<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>';
        }
        for($i=5; $i>round($this->note); $i--){
            $etoile .='<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>';
        }
        return $etoile;
    }
}
