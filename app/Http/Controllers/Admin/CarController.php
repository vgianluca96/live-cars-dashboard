<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cars.index', ['cars' => Car::paginate(9)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        $data = $request->validated();

        //dd($data);

        if ($request->has('image')) {
            $path = Storage::put('car_images', $data['image']);
            $data['image'] = $path;
        }

        Car::create($data);

        return to_route('admin.cars.index')->with('message', 'Car successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {

        $data = $request->validated();
        //dd($data);

        if ($request->has('image')) {
            $path = Storage::put('car_images', $request->image);
            $data['image'] = $path;

            if (Storage::exists($car->image)) {
                Storage::delete($car->image);
            }
        }

        $car->update($data);

        return to_route('admin.cars.index')->with('message', 'Car successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {

        if (Storage::exists($car->image)) {
            Storage::delete($car->image);
        }

        $car->delete();

        return to_route('admin.cars.index')->with('message', 'Car successfully deleted');
    }
}
