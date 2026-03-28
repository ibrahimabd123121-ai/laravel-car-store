<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id){

    $car = Car::findorfail($id);
    $cart = session()->get('cart',[]);
    if(isset($car[$id])){

    $cart[$id]['quantity']++;




    }else{

    $cart[$id]=[

        "name"=>$car->name,
        "price" => $car->price,
        "image"=> $car->images->first()->image ?? null,
        "quantity"=> 1
    ];

    session()->put('put',$cart);
    return redirect()->back()->with('success','car addedd to cart');

    }
    }

    public function index(){

        $cart = session()->get('cart',[]);
        return view('store.cart',compact('cart'));
    }

    public function update(Request $request,$id){

        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
        }
        return redirect()->back()->with('success','cart updated successfully');
    }

    public function remove($id){

        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return redirect()->back()->with('success','car removed from cart');
    }
}
