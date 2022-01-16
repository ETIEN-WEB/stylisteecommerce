<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonelivraisonController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Admin\HomeController;

// Dashboard
Route::get('/dashboard', 'HomeController@index')->name('home');


Route::get('creetaille',[\App\Http\Controllers\ProduitController::class,'creetaill'])->name('creetaille');

//find the souscategorie of the categorie

Route::get('findsouscategorie',[\App\Http\Controllers\ProduitController::class,'findsouscategorie'])->name('findsouscategorie');


Route::group(['prefix'=>'produits'],function (){
    Route::get('/create',[\App\Http\Controllers\ProduitController::class,'create'])->name('produit.create');
    Route::post('/store',[\App\Http\Controllers\ProduitController::class,'store'])->name('produit.store');
    Route::get('/index',[\App\Http\Controllers\ProduitController::class,'index'])->name('produit.index');
    Route::post('/update-{produit}',[\App\Http\Controllers\ProduitController::class,'update'])->name('produit.update');
    Route::get('/edit-{produit}',[\App\Http\Controllers\ProduitController::class,'edit'])->name('produit.edit');
    Route::get('/destroy-{produit}',[\App\Http\Controllers\ProduitController::class,'destroy'])->name('produit.destroy');
    Route::get('/delete-image-{image}-{produit}',[\App\Http\Controllers\ProduitController::class,'destroyImage'])->name('image.destroy');
});
//Route for zone of livraison
Route::group(['prefix'=>'zone-de-livraison'],function (){
    Route::get('index',[ZonelivraisonController::class,'index'])->name('zonelivraison.index');
    Route::get('create',[ZonelivraisonController::class,'create'])->name('zonelivraison.create');
    Route::get('edit-{zonelivraison}',[ZonelivraisonController::class,'edit'])->name('zonelivraison.edit');
    Route::post('store',[ZonelivraisonController::class,'store'])->name('zonelivraison.store');
    Route::post('update-{zonelivraison}',[ZonelivraisonController::class,'update'])->name('zonelivraison.update');
    Route::get('destroy-{zonelivraison}',[ZonelivraisonController::class,'destroy'])->name('zonelivraison.destroy');
});
//Route for commande
Route::group(['prefix'=>'commande'],function (){
    Route::get('index',[CommandeController::class,'index'])->name('commande.index');
    Route::get('show-{commande}',[CommandeController::class,'show'])->name('commande.show');
    Route::get('valider-commande-{commande}-{currentstatut}',[CommandeController::class,'confirme'])->name('commande.confirme');
    Route::post('store',[CommandeController::class,'store'])->name('commande.store');
    Route::post('update-{zonelivraison}',[CommandeController::class,'update'])->name('commande.update');
    Route::get('destroy-{zonelivraison}',[CommandeController::class,'destroy'])->name('commande.destroy');
});
