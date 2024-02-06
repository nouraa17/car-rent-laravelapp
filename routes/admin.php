<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarUserController;
use App\Http\Controllers\CategoryController;


use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('adminlogout');

///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/listusers', [CarUserController::class, 'index'])->name('listusers');
Route::get('/adduser', [CarUserController::class, 'create'])->name('adduser');
Route::post('/storeuser', [CarUserController::class, 'store'])->name('storeuser');
Route::get('/edituser/{id}', [CarUserController::class, 'edit'])->name('edituser');
Route::put('/updateuser/{id}', [CarUserController::class, 'update'])->name('updateuser');

///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/listcategories', [CategoryController::class, 'index'])->name('listcategories');
Route::get('/addcategory', [CategoryController::class, 'create'])->name('addcategory');
Route::post('/storecategory', [CategoryController::class, 'store'])->name('storecategory');
Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
Route::put('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
Route::get('/deletecategory/{id}', [CategoryController::class, 'destroy'])->name('deletecategory');

///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/listcars', [CarController::class, 'index'])->name('listcars');
Route::get('/addcar', [CarController::class, 'create'])->name('addcar');
Route::post('/storecar', [CarController::class, 'store'])->name('storecar');
Route::get('/editcar/{id}', [CarController::class, 'edit'])->name('editcar');
Route::put('/updatecar/{id}', [CarController::class, 'update'])->name('updatecar');
Route::get('/deletecar/{id}', [CarController::class, 'destroy'])->name('deletecar');

///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/listtestimonials', function () {
    return view('admin.testimonials.listTestimonials');
})->name('listtestimonials');

Route::get('/addtestimonial', function () {
    return view('admin.testimonials.addTestimonial');
})->name('addtestimonial');

Route::get('/edittestimonial', function () {
    return view('admin.testimonials.editTestimonial');
})->name('edittestimonial');
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/listmessages', function () {
    return view('admin.messages.listMessages');
})->name('listmessages');
