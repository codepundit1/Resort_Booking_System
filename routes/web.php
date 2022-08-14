<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//homepage resort
Route::get('/', HomepageController::class)->name('homepage');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//user
Route::group(['middleware' => 'auth'], function() {
    Route::get('view-user', [UserController::class, 'index'])->name('user.view');
    Route::get('add-user', [UserController::class, 'create'])->name('user.create');
    Route::post('store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('edit-user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('edit-user/{id}', [UserController::class, 'update'])->name('user.update');
});



//Resort
Route::group(['middleware' => 'auth'], function() {
    Route::get('resorts', [ResortController::class, 'index'])->name('resort.view');
    Route::get('create-resort', [ResortController::class, 'create'])->name('resort.create');
    Route::post('store-resort', [ResortController::class, 'store'])->name('resort.store');
    Route::get('delete-resort/{id}', [ResortController::class, 'destroy'])->name('resort.destroy');
    Route::get('edit-resort/{id}', [ResortController::class, 'show'])->name('resort.show');
    Route::put('edit-resort/{id}', [ResortController::class, 'update'])->name('resort.update');
});


// booking
Route::group(['middleware' => 'auth'], function() {
    Route::get('bookings', [BookingController::class, 'index'])->middleware('auth')->name('booking.index');
    Route::get('resorts/{resort}/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('resorts/{resort}/booking', [BookingController::class, 'store'])->name('booking.store');
});



