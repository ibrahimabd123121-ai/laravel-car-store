<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\OrderItem;
class CheckoutController extends Controller
{
    public function index(){
        return view('store.checkout');
    }

    public function store(Request $request){
        $cart = session()->get('cart',[]);
        $total = 0;
        foreach($cart as $id => $item){
            $total += $item['price'] * $item['quantity'];
        }
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total
        ]);
        foreach($cart as $id => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'car_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
             session()->forget('cart');
        return redirect('/')->with('success', 'Order placed successfully!');
        }
    }
}