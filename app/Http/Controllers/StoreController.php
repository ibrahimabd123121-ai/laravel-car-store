<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function cars(){
    $cars = Car::with('brand','images')->paginate(9);
    return view('store.cars',compact('cars'));
    }


    public function show($id){
    $car = Car::where('id',$id)->firstOrFail();
    return view('store.show', compact('car'));
}

}