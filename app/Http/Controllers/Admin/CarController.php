<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $car=Car::with('brand')->paginate(10);
        return view('admin.cars.index',compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::all();
        return view('admin.cars.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'brand_id' => 'required|exists:brands,id',
        'name' => 'required',
        'model' => 'required',
        'year' => 'required',
        'price' => 'required|numeric',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $car = Car::create($request->except('images'));
    
    if ($request->hasFile('images')) {
        foreach($request->file('images') as $image) {
            $path = $image->store('cars', 'public');
            CarImage::create([
                'car_id' => $car->id,
                'image' => $path
            ]);
        }
    }
       
        return redirect()->route('cars.index')->with('success','car added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show( Car $car)
    {
        $car->load('brand', 'images');
    return view('admin.cars.show', compact('car'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        
    $brands = Brand::all();
    return view('admin.cars.edit', compact('car', 'brands'));

    }
    

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Car $car)
{
    $request->validate([
        'brand_id' => 'required|exists:brands,id',
        'name' => 'required',
        'model' => 'required',
        'year' => 'required',
        'price' => 'required|numeric'
    ]);

    $car->update([
        'brand_id' => $request->brand_id,
        'name' => $request->name,
        'model' => $request->model,
        'year' => $request->year,
        'price' => $request->price
    ]);
    
    return redirect()->route('cars.index')->with('success', 'Car updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
         $car->delete();
        return redirect()->back();
    }
}
