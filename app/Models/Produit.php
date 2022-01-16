<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'souscategory_id',
        'garantie_id',
        'detail',
        'etat',
    ];
    public function description(){
        return $this->hasMany(Description::class);
    }
    public function firstPrice(){
        $price= $this->description()->first();
        $le_prix = strrev(wordwrap(strrev($price->prix), 3, '.', true));
            return $le_prix ;
        
    }

    

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function souscategorie(){
        return $this->belongsTo('App\Models\Souscategorie','souscategory_id','id');
    }
    public function matieres(){
        return $this->belongsToMany(Matiere::class);
    }
    public function garantie(){
        return $this->belongsTo(Garantie::class);
    }
    public function tailles(){
        return $this->belongsToMany(Taille::class);
    }
    public function firstImage(){
        $image= $this->images()->first();
        if ($image){
            return $image->libelle;
        }else{
            return 'lydishop-achetez-en-ligne-vetements-et-accessoires-homme-et-fe-logo-1581274806.png';
        }
    }
    public function latestImage(){
         $image = $this->images()->orderByDesc('images.id')->first();
         return $image->libelle;
    }
    public function reviews(){
        return $this->hasMany(Review::class)->orderByDesc('id');
    }
    // la note du poduit
    public function note(){
        $nbcount = $this->reviews()->count()>0?$this->reviews()->count():1;
        return round($this->reviews()->sum('note')/$nbcount,1);
    }
    public function etoile(){
        $etoile='';
        for($i=1; $i<=round($this->note()); $i++){
            $etoile.='<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>';
        }
        for($i=5; $i>round($this->note()); $i--){
            $etoile .='<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>';
        }
        return $etoile;
    }
    // les évaluations du produit dont la note est $etoile compte les
    //ou le nbre de pesonnes qui ont donné la note $etoile
    public function nbByNote($etoile){
        return $this->reviews()->where('note',$etoile)->count();
    }
    //Le nbre de personne qui ont donnée la note ($this->nbByNote($etoile)) diviser par le nbre d'évaluations
    //
    public function widthNote($etoile){
        $nbcount = $this->reviews()->count()>0?$this->reviews()->count():1;
        return $this->nbByNote($etoile)*(100/$nbcount);
    }

}
