<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Parts;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $parts=Parts::with('car')->paginate(10);
        return view('admin.parts.index',compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::all();
        return view('admin.parts.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([

            'car_id'=>'required|exists:cars,id',
            'name'=>'required',
            'price'=>'required',
            'stock'=>'required',
           
        ]);

        Parts::create([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        
        return redirect()->route('parts.index')->with('success','part added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Parts $part)
    {
        return view('admin.parts.show', compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parts $part)
    {
        $cars = Car::all();
        return view('admin.parts.edit', compact('part', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parts $part)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable|string|max:255',

        ]);
        $part->update($request->only(['car_id', 'name', 'price', 'stock', 'description']));
        return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parts $part)
    {
         $part->delete();
        return redirect()->back();
    }

}