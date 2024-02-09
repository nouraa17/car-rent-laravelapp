<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\Common;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
     private $columns = [
        'title',
        'content',
        'luggage',
        'doors',
        'passengers',
        'price',
        'active',
        'image',
        'cat_id',
    ];
    public function index()
    {
        $cars = Car::get();
        $categories = Category::get();
        return view('admin.cars.listCars',compact('cars','categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.cars.addCar',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $car = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'luggage' => 'required|numeric',
            'doors' => 'required|numeric',
            'passengers' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'cat_id' => 'required|numeric',
        ]);

        $fileName = $this->uploadFile($request->image, 'assets/carsimgs');

        $car = $request->only($this->columns);
        $car['active'] = isset($request->active);
        $car['image'] = $fileName;
        Car::create($car);
        return redirect('admin/addcar')->with('success', 'Car has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::get(); 
        return view('admin.cars.editCar',compact('car','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'luggage' => 'required|numeric',
            'doors' => 'required|numeric',
            'passengers' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'cat_id' => 'required|numeric',
        ]);
        $car = $request->only($this->columns);
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/carsimgs');
            $car['image'] = $fileName;
        }
        $car['active'] = isset($request->active);
        Car::where('id', $id)->update($car);
        return redirect('admin/editcar/'.$id)->with('success', 'Car has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('admin/listcars')->with('success', 'Car has been deleted successfully!');
    }
}
