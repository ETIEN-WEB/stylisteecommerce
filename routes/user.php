<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;


Route::middleware(['guest:web'])->group(function(){
    Route::view('/login','user.login')->name('login');    
    Route::view('/register','user.register')->name('register');
    Route::post('/create',[UserController::class,'create'])->name('create');
    Route::post('/check',[UserController::class,'check'])->name('check');
    Route::get('/firstformforgotpassword',[UserController::class,'firstformforgotpassword'])->name('firstformforgotpassword');
    Route::post('/post_forget_password',[UserController::class,'postForget_password'])->name('post_forget_password');
    Route::get('/getResetPassword/{reset_code}',[UserController::class,'getResetPassword'])->name('getResetPassword');
    Route::post('/postResetPassword/{reset_code}',[UserController::class,'postResetPassword'])->name('postResetPassword');


    


    
});

Route::middleware(['auth:web'])->group(function(){
    Route::get('/home',[UserController::class,'home'])->name('home');
    Route::post('/logout',[UserController::class,'logout'])->name('logout');
    Route::post('/updateuserinfo-{user}',[UserController::class,'updateuserinfo'])->name('updateuserinfo');
    Route::post('/updateuserpassword',[UserController::class,'updateuserpassword'])->name('updateuserpassword');

    // Commande liste
    Route::get('commande',[UserController::class,'commandeliste'])->name('commande.index');
    Route::get('commandeshow-{commande}-{increment}',[UserController::class,'commandeshow'])->name('commande.show');
    
  //   Route::get('/add-new',[UserController::class,'add'])->name('add');



});


 