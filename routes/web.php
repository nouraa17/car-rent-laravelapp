<?php

use Illuminate\Support\Facades\Route;

// Auth::routes(['verify' => true]);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');


Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('listing', [App\Http\Controllers\PageController::class, 'listing'])->name('listing');
Route::get('testimonials', [App\Http\Controllers\PageController::class, 'testimonials'])->name('testimonials');
Route::get('blog', [App\Http\Controllers\PageController::class, 'blog'])->name('blog');
Route::get('about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');

