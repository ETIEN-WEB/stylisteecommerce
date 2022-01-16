<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Type_ville;
use App\Models\Ville;
use App\Models\Adresse;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdresseController extends Controller
{
    //
    private function currentUser(){
        return Auth::guard('web')->user();
    }

    public function create()
    {
        $data['localites'] = Type_ville::all();
        $data['current'] = 'adresse';
        $data['user'] = $this->currentUser();
        return view('user.adresse.create', $data);
    }
    
    public function index()
    {
        $data['current'] = 'adresse';
        $data['user'] = $this->currentUser();
        return view('user.adresse.index', $data);
    }

    public function findville(Request $request){
        //dd($request->id);
        $val_ville = Ville::select('libelle', 'id')->where('type_ville_id', $request->id)->take(100)->get();
       // dd($val_ville);
        return response()->json($val_ville);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ville'=> 'required',
            'type_ville'=> 'required',
            'first_name'=> 'required',
            'name'=> 'required',
            'contact1'=> 'required',
            'contact2'=> 'nullable',
            'adresse_detail'=> 'required',
            'info_suplementaire'=> 'string|min:2|max:255|nullable',
            'current_adresse' => 'nullable',
        ]);

        if ($validator->fails()) {
            
           return back()->withErrors($validator)->withInput();
           //;
        } 
        

        if (htmlspecialchars($request->current_adresse) != '') {
           //$this->currentUser()->adressedefault->update(['current_adresse'=>false]);
           Adresse::where('user_id','=',$this->currentUser()->id)->update(['current_adresse'=>false]);
            Adresse::create([
                'user_id'=>$this->currentUser()->id,
                'first_name'=>htmlspecialchars($request->first_name),
                'ville_id'=>htmlspecialchars($request->ville),
                'name'=>htmlspecialchars($request->name),
                'contact1'=>htmlspecialchars($request->contact1),
                'contact2'=>htmlspecialchars($request->contact2),
                'adresse_detail'=>htmlspecialchars($request->adresse_detail),
                'info_suplementaire'=>htmlspecialchars($request->info_suplementaire),
                'current_adresse'=> true,
                ]);
        } else {
            Adresse::create([
            'user_id'=>$this->currentUser()->id,
            'first_name'=>htmlspecialchars($request->first_name),
            'ville_id'=>htmlspecialchars($request->ville),
            'name'=>htmlspecialchars($request->name),
            'contact1'=>htmlspecialchars($request->contact1),
            'contact2'=>htmlspecialchars($request->contact2),
            'adresse_detail'=>htmlspecialchars($request->adresse_detail),
            'info_suplementaire'=>htmlspecialchars($request->info_suplementaire),
            'current_adresse'=> false,
            ]);
        }
        if (Session::get('via_checkout')) {
            Session::forget('via_checkout');
            
            Flasher::success('Adresse de livraison enregistré avec succès');
            return redirect()->route('checkout');
        }else{
            Flasher::success('Adresse de livraison enregistré avec succès');
            return redirect()->route('user.home');
        }
        
        

    }


    
    public function edit(Adresse $adresse)
    {
        $data['localites'] = Type_ville::all();
        $data['current'] = 'adresse';
        $data['adresse'] = $adresse;
        $data['user'] = $this->currentUser();
        return view('user.adresse.edit', $data);
    }

    public function update(Request $request, Adresse $adresse)
    {
        //$validation = $this->validate($request,[
        $validator = Validator::make($request->all(), [
            'ville'=> 'required',
            'type_ville'=> 'required',
            'first_name'=> 'required',
            'name'=> 'required',
            'contact1'=> 'required',
            'contact2'=> 'nullable',
            'adresse_detail'=> 'required',
            'info_suplementaire'=> 'string|min:2|max:255|nullable',
            'current_adresse' => 'nullable',
        ]);

        if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
        } 
        
        if (htmlspecialchars($request->current_adresse) != '') {
            Adresse::where('user_id','=',$this->currentUser()->id)->update(['current_adresse'=>false]);
            //Adresse::where('current_adresse','=',true)->update(['current_adresse'=>false]);
            $adresse->user_id = $this->currentUser()->id;
            $adresse->first_name = htmlspecialchars($request->first_name);
            $adresse->ville_id = htmlspecialchars($request->ville);
            $adresse->name = htmlspecialchars($request->name);
            $adresse->contact1 = htmlspecialchars($request->contact1);
            $adresse->contact2 = htmlspecialchars($request->contact2);
            $adresse->adresse_detail = htmlspecialchars($request->adresse_detail);
            $adresse->info_suplementaire =htmlspecialchars($request->info_suplementaire);
            $adresse->current_adresse = true;
            $adresse->save();
        } else {
            $adresse->user_id = $this->currentUser()->id;
            $adresse->first_name = htmlspecialchars($request->first_name);
            $adresse->ville_id = htmlspecialchars($request->ville);
            $adresse->name = htmlspecialchars($request->name);
            $adresse->contact1 = htmlspecialchars($request->contact1);
            $adresse->contact2 = htmlspecialchars($request->contact2);
            $adresse->adresse_detail = htmlspecialchars($request->adresse_detail);
            $adresse->info_suplementaire = htmlspecialchars($request->info_suplementaire);
            $adresse->current_adresse = false;
            $adresse->save();
            
        }
        return redirect()->route('user.home')->with('success','Adresse de livraison Modifié avec succès');
    }

    public function defaut(Adresse $adresse){
        Adresse::where('user_id','=',$this->currentUser()->id)->update(['current_adresse'=>false]);
        $adresse->update(['current_adresse'=> true]);
        Flasher::success('Adresse defini par defaut avec success');
        return back();
    }

    public function destroy(Adresse $adresse)
    {
        $adresse->delete();
        return back()->with('success','Adresse suprimer avec');
    }

    




}
