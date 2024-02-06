<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns= [
        'cat_name',
    ];

    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.listCategories', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.addCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->validate([
            'cat_name' => 'required|string|max:50',
        ]);
        $category = $request->only($this->columns);
        Category::create($category);
        return redirect('admin/addcategory')->with('success', 'Category has been added successfully!');
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
        $category = Category::findOrFail($id);
        return view('admin.categories.editCategory',compact('category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = $request->validate([
            'cat_name' => 'required|string|max:50',
        ]);
        // $category = Category::findOrFail($id);
        $category = $request->only($this->columns);
        Category::where('id', $id)->update($category);
        return redirect('admin/editcategory/'.$id)->with('success', 'Category has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Car::where('cat_id', $id)->exists()) {
            return redirect('admin/listcategories')->with('error', 'Category is assigned to a car. Cannot delete.');
        }
        Category::where('id', $id)->delete();
        return redirect('admin/listcategories')->with('success', 'Category has been deleted successfully!');


    }
}
