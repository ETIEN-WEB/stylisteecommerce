<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Review;
use App\myClass\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    private function currentUser(){
        return Auth::guard('web')->user();
    }

    public function create(Produit $produit){
        $data['sub_title']= 'Veuillez commenter le produit '.$produit->libelle;
        $data['current'] ='commande';
        $data['produit'] = $produit;
        $data['user'] = $this->currentUser();
        $review =Review::where(['user_id'=>Auth::guard('web')->user()->id,'produit_id'=>$produit->id])->first();
        if ($review!=null){
            $data['review'] = $review;
        }else{

        }
        return view('client.reviews.create',$data);
    }
    public function store(Request $request, Produit $produit){
        $this->validate($request,[
            'titre'=>'required',
            'note'=>'required',
            'commentaire'=>'required'
        ]);
        $review = Review::where(['user_id'=>$this->currentUser()->id,'produit_id'=>$produit->id])->first();
        if ($review==null){
            Review::create([
                'user_id'=>$this->currentUser()->id,
                'titre'=>htmlspecialchars($request->titre),
                'note'=>htmlspecialchars($request->note),
                'commentaire'=>htmlspecialchars($request->commentaire),
                'produit_id'=>$produit->id,
            ]);
        }else{
            $review->update([
                'user_id'=>$this->currentUser()->id,
                'titre'=>htmlspecialchars($request->titre),
                'note'=>htmlspecialchars($request->note),
                'commentaire'=>htmlspecialchars($request->commentaire),
                'produit_id'=>$produit->id,
            ]);
        }
        Flasher::success('Commentaire enregistrer avec succès');
        return redirect()->route('user.commande.index');
    }


   





}
