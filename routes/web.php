<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PageController::class, 'acceuil'])->name('acceuil');
Route::get('/show_product', [PageController::class, 'show_product'])->name('show.product');
Route::get('/select_par_cat-{categorie}', [PageController::class, 'select_par_cat'])->name('categorie');
Route::get('/select_par_souscat-{souscategorie}', [PageController::class, 'select_par_souscat'])->name('souscategorie');
Route::get('produit_par_prix-{categorie}', [PageController::class, 'produit_par_prix'])->name('produit.prix');
Route::get('/taille_produit/{taille}-{categorie}', [PageController::class, 'taille_produit'])->name('taille.produit');


//Afficher quantité de produit ajouter dans le panier 
Route::get('/load-cart-data',[PanierController::class,'cartloadbyajax']);


Route::group(['prefix'=>'produit'],function (){
    Route::get('show-{produit}',[ProduitController::class,'show'])->name('produit.show');
    Route::get('add-panier-{produit}-{taille}-{couleur}-{qty}',[PanierController::class,'store'])->name('panier.store');
    Route::get('update-panier-{product_id}',[PanierController::class,'update'])->name('panier.update');
    Route::get('delet-panier',[PanierController::class,'destroy'])->name('panier.destroy');
    Route::get('ajouter_panier/{produit}',[ProduitController::class,'ajouter_panier'])->name('produit.panier');
    Route::get('index-panier',[PanierController::class,'index'])->name('panier.index');
    Route::get('checkout',[CommandeController::class,'checkout'])->name('checkout')->middleware('auth:web');
    Route::post('create-commande',[CommandeController::class,'store'])->name('commande.store')->middleware('auth:web');
    Route::get('findproductprice-{description}',[ProduitController::class,'findproductprice'])->name('findproductprice');
});


//Route for adresse livraison
Route::get('findville',[AdresseController::class,'findville'])->name('findville');
Route::group(['prefix'=>'adresse'],function (){
    Route::get('index',[AdresseController::class,'index'])->name('adresse.index');
    Route::get('create',[AdresseController::class,'create'])->name('adresse.create');
    Route::post('store',[AdresseController::class,'store'])->name('adresse.store');
    Route::get('edit-{adresse}',[AdresseController::class,'edit'])->name('adresse.edit');
    Route::post('update-{adresse}',[AdresseController::class,'update'])->name('adresse.update');
    Route::get('defaut-{adresse}',[AdresseController::class,'defaut'])->name('adresse.defaut');
    Route::get('destroy-{adresse}',[AdresseController::class,'destroy'])->name('adresse.destroy');
 });

 //Route for the wishlist
Route::group(['prefix'=>'reviews'],function (){
    Route::post('store-{produit}',[ReviewController::class,'store'])->name('reviews.store');
    Route::get('create-{produit}',[ReviewController::class,'create'])->name('reviews.create');
    Route::get('edit-{produit}-{review}',[ReviewController::class,'create'])->name('reviews.edit');
    Route::get('nbwishlist',[ReviewController::class,'nbwishlist'])->name('reviews.count');
});

