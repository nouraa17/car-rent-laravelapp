<?php

use Illuminate\Support\Facades\Route;
Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
