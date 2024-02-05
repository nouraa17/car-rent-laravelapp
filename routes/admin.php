<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('adminlogout');



Route::get('/listusers', [App\Http\Controllers\CarUserController::class, 'index'])->middleware('verified')->name('listusers');
Route::get('/adduser', [App\Http\Controllers\CarUserController::class, 'create'])->name('adduser');
Route::post('/storeuser', [App\Http\Controllers\CarUserController::class, 'store'])->name('storeuser');
Route::get('/edituser/{id}', [App\Http\Controllers\CarUserController::class, 'edit'])->name('edituser');
Route::put('/updateuser/{id}', [App\Http\Controllers\CarUserController::class, 'update'])->name('updateuser');

///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/listcategories', function () {
    return view('admin.categories.listCategories');
})->name('listcategories');

Route::get('/addcategory', function () {
return view('admin.categories.addCategory');
})->name('addcategory');

Route::get('/editcategory', function () {
return view('admin.categories.editCategory');
})->name('editcategory');
///////////////////////////////////////////////////////////////////////////////////////////


Route::get('/listcars', function () {
        return view('admin.cars.listCars');
})->name('listcars');

Route::get('/addcar', function () {
    return view('admin.cars.addCar');
})->name('addcar');

Route::get('/editcar', function () {
    return view('admin.cars.editCar');
})->name('editcar');
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
