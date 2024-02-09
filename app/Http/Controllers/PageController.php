<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $cars = Car::where('active', true)->latest()->take(6)->get();
        $testimonials = Testimonial::where('published', true)->latest()->take(3)->get();
        return view('index', compact('cars', 'testimonials'));
    }

    public function listing()
    {
        $cars = Car::where('active', true)->paginate(6);
        $testimonials = Testimonial::where('published', true)->latest()->take(3)->get();

        return view('listing', compact('cars', 'testimonials'));
    }
    public function testimonials()
    {
        $testimonials = Testimonial::get();
        return view('testimonials', compact('testimonials'));
    }
    public function blog()
    {
        return view('blog');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        // $categories = Category::get();
        $categoriesWithCount = Category::withCount('cars')->get();
        $dateString = $car['created_at'];
        $formattedDate = date("M d, Y", strtotime($dateString));
        $car['formatted_created_at'] = $formattedDate;
        
        return view('showCar', compact('car', 'categoriesWithCount'));
    }
}
