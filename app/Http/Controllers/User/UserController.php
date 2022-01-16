<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use App\Models\User;
use App\Models\Commande;
use App\Models\Description;
use App\Models\Produit;
use App\Models\Taille;
use App\Models\Matiere;
use Illuminate\Support\Facades\Auth;
use App\Models\Mpass_reset;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class UserController extends Controller
{
    //
    private function currentUser(){
        return Auth::guard('web')->user();
    }

    function create(Request $request){
        //Validate Inputs
        $request->validate([
            'first_name'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'condtion_utilisation'=>'required'
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->phone = $request->phone;
        $user->condtion_utilisation = 'accepté';
        $user->accepte_newsletter = !empty($request->accepte_newsletter) ? $request->accepte_newsletter:NULL; 
        $save = $user->save();
        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Ce email n\'existe pas dans notre base de donnée '
        ]);

        $remember = !empty($request->remember_me) ? true:false; 

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds, $remember) ){
          
            return redirect()->route('acceuil')->with('success','Connection réussie');
        }else{
            return redirect()->route('acceuil')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('acceuil');
    }

    public function home()
    {
        $data['current'] = 'compte';
        $data['user'] = $this->currentUser();
        return view('user.dashboard', $data);
    }

    public function firstformforgotpassword(){
        return view('user.firstformforgotpassword');
    }

    public function postForget_password(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);
        $user=User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('fail','Utilisateur non trouvé.');
        }
        else{
            $reset_code= Str::random(200);
            Mpass_reset::create([
                'userid' => $user->id,
                'reset_code' => $reset_code
            ]);
            Mail::to($user->email)->send(new ForgetPasswordMail($user->name, $reset_code));
            return redirect()->back()->with('success','Nous avons envoyé un lien de renitialisation de votre mot de passe. Veuillez consulter votre mail.'); 
        }
    }

    public function getResetPassword($reset_code){
        $password_reset_data =Mpass_reset::where('reset_code', $reset_code)->first();

        if (!$password_reset_data || Carbon::now()->subMinutes(10)> $password_reset_data->created_at) {
        return redirect()->route('user.firstformforgotpassword')->with('fail','lien invalide ou expiré');
        } else {
        return view('user.form_reset_password', compact('reset_code'));
        }
    }

    public function postResetPassword($reset_code, Request $request){
        $password_reset_data =Mpass_reset::where('reset_code', $reset_code)->first();
        if (!$password_reset_data || Carbon::now()->subMinutes(10)> $password_reset_data->created_at) {
            return redirect()->route('user.firstformforgotpassword')->with('fail','lien invalide ou expiré');
        } else {
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:5|max:30',
                'cpassword'=>'required|min:5|max:30|same:password'
            ]);
            $user=User::find($password_reset_data->userid);
            if ($user->email != $request->email){
                return redirect()->back()->with('fail','Entrer un mail correct.'); 
            } else {
                $password_reset_data->delete();
                $user->update([
                    'password'=> \Hash::make($request->password)
                ]);
                return redirect()->route('user.login')->with('success','mot de passe renitialiser veuillez vous connecter');
            }
        }
    }
    
    public function updateuserinfo(Request $request, User $user){
        $this->validate($request,[
            'first_name'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ]);
        $user->first_name = htmlspecialchars($request->first_name);
        $user->name = htmlspecialchars($request->name);
        $user->phone = htmlspecialchars($request->phone);
        
        $user->save();
        return back()->with('success','Profil modifié avec succès');
    }

    public function updateuserpassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password'=>'required',
            'npassword'=>'required|min:6',
            'cpassword'=>'required|same:npassword',
        ],[
            'cpassword.same'=>'L\'ancien mot de passe et le nouveau ne correspondent pas'
        ]);

        if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        
        else{
            if (Hash::check($request->password ,$this->currentUser()->getAuthPassword())){
                $this->currentUser()->update([
                    'password'=>Hash::make(htmlspecialchars($request->npassword))
                ]);
                return response()->json(['status'=>1, 'msg'=>'Mot de passe modifié avec succès']);
                //return back()->with('success','Mot de passe modifié avec succès');
            }else{
                return response()->json(['status'=>2, 'msg'=>'Ancien mot passe erroné']);
                //return back()->with('fail','Ancien mot passe erroné');
            }
        }
    }

    public function commandeliste(){
        $data['commandes'] = $this->currentUser()->commandes->all();
        //dd($data['commandes']);
        $data['current'] = 'commande';
        
        $data['user'] = $this->currentUser();
        return view('user.orders.index', $data);
    }
    public function commandeshow(Commande $commande, $increment){
        //dd($commande, $increment);
        $data['commande'] = $commande;
    
        $data['current'] = 'commande';
        
        $data['user'] = $this->currentUser();
        return view('user.orders.show', $data);
    }



}
