<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function listing()
    {
        return view('listing');
    }
    public function testimonials()
    {
        return view('testimonials');
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
}
