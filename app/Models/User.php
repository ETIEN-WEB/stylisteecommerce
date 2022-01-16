<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'name',
        'email',
        'password',
        'phone',
        'condtion_utilisation',
        'accepte_newsletter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adresses(){
        return $this->hasMany(Adresse::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
  

    public function adressedefault(){
        $defaut = $this->adresses()->where('current_adresse','=',true)->first();
        return $defaut;
    }
    public function fraislivraison(){
        $frais= $this->adressedefault()->ville->livraison;
        return $frais->frais;
    }
    public function villelivraison(){
        $ville= $this->adressedefault()->ville;
        return $ville->libelle;
    }

   
     //= $user->adressedefault()->ville->livraison->frais;
 

    public function datedebut(){
        $nb_jour = $this->adressedefault()->ville->livraison;
        $offset = $nb_jour->nbre_jour_debut; 
        $strtotim = strtotime("+$offset day", strtotime(date("d-m-Y")));
        $ladate = getdate($strtotim);

        $jd = $ladate['mon'];
        $j="";
        switch($jd){
        case 1: $j= "jan";
        break;
        case 2: $j= "fev";
        break;
        case 3: $j= "mars";
        break;
        case 4: $j= "avr";
        break;
        case 5: $j= "mai";
        break;
        case 6: $j= "jun";
        break;
        case 7: $j= "jull";
        break;
        case 8: $j= "Août";
        break;
        case 9: $j= "sept";
        break;
        case 10: $j= "sept";
        break;
        case 11: $j= "nov";
        break;
        case 12: $j= "dec";
        break;
        default: $j= "Erreur";
        }

        $jour = $ladate['wday'];
        $wd="";
        switch($jour){
        case 0: $wd= "dimanche";
        break;
        case 1: $wd= "lundi";
        break;
        case 2: $wd= "mardi";
        break;
        case 3: $wd= "mercredi";
        break;
        case 4: $wd= "jeudi";
        break;
        case 5: $wd= "vendredi";
        break;
        case 6: $wd= "samedi";
        break;
        default: $wd= "Erreur";
        }
        return $wd." ". "  ". $ladate['mday']."  " ." "." ".$j;
    }

    public function datefin(){
        $nb_jour = $this->adressedefault()->ville->livraison;
        $offset = $nb_jour->nbre_jour_fin; 
        $strtotim = strtotime("+$offset day", strtotime(date("d-m-Y")));
        $ladate = getdate($strtotim);

        $jd = $ladate['mon'];
        $j="";
        switch($jd){
        case 1: $j= "jan";
        break;
        case 2: $j= "fev";
        break;
        case 3: $j= "mars";
        break;
        case 4: $j= "avr";
        break;
        case 5: $j= "mai";
        break;
        case 6: $j= "jun";
        break;
        case 7: $j= "jull";
        break;
        case 8: $j= "Août";
        break;
        case 9: $j= "sept";
        break;
        case 10: $j= "sept";
        break;
        case 11: $j= "nov";
        break;
        case 12: $j= "dec";
        break;
        default: $j= "Erreur";
        }

        $jour = $ladate['wday'];
        $wd="";
        switch($jour){
        case 0: $wd= "dimanche";
        break;
        case 1: $wd= "lundi";
        break;
        case 2: $wd= "mardi";
        break;
        case 3: $wd= "mercredi";
        break;
        case 4: $wd= "jeudi";
        break;
        case 5: $wd= "vendredi";
        break;
        case 6: $wd= "samedi";
        break;
        default: $wd= "Erreur";
        }
        return $wd." ". "  ". $ladate['mday']."  " ." "." ".$j;
    }


}
