<?php

use App\Http\Controllers\PageController;
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


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('listing', [PageController::class, 'listing'])->name('listing');
Route::get('testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::get('show/{id}', [PageController::class, 'show'])->name('showcar');
