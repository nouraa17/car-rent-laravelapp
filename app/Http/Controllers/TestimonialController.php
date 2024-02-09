<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    private $columns = [
        'name',
        'position',
        'content',
        'published',
        'image',
    ];
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonials.listTestimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonial = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = $this->uploadFile($request->image, 'assets/testimonialsimgs');

        $testimonial = $request->only($this->columns);
        $testimonial['published'] = isset($request->published);
        $testimonial['image'] = $fileName;
        Testimonial::create($testimonial);
        return redirect('admin/addtestimonial')->with('success', 'Testimonial has been added successfully!');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.editTestimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ]);



        $testimonial = $request->only($this->columns);
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/testimonialsimgs');
            $testimonial['image'] = $fileName;
        }
        $testimonial['published'] = isset($request->published);
        Testimonial::where('id', $id)->update($testimonial);
        return redirect('admin/edittestimonial/' . $id)->with('success', 'Testimonial has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect('admin/listtestimonials')->with('success', 'Testimonial has been deleted successfully!');
    }
}
