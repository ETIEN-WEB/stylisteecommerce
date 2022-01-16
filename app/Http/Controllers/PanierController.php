<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\myClass\Flasher;
use Illuminate\Support\Facades\Cookie;

class PanierController extends Controller
{
    //    
    public function index()
    {
        //$data['sub_title'] ='voir les produit dans mon panier';
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('client.page.cart')
            ->with('cart_data',$cart_data);
        
    }

    public function update(Request $request, $product_id){
        //dd($request->Qte, $product_id);
        // $panier->quantite = $request->Qte;
        $prod_id = $product_id;
        $quantity = $request->Qte;

        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = 2000;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        Flasher::success($cart_data[$keys]["item_name"].'a été ajouté avec succès');
                        return response()->json(['msg'=>' '.$cart_data[$keys]["item_name"].' '.'']);
                    }
                }
            }
        }
    }

    
    public function cartloadbyajax()
    {
        if(Cookie::get('shopping_cart'))
        {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }

    public function destroy(Request $request)
    {
        $prod_id = $request->ProductId;
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 2000;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    Flasher::success('Produit supprimer avec succès');
                    //return response();
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }

    // Si la commande a reussi supprime la cookie panier
    
    // public function clearcart()
    // {
    //     Cookie::queue(Cookie::forget('shopping_cart'));
    //     return response()->json(['status'=>'Your Cart is Cleared']);
    // }








}
