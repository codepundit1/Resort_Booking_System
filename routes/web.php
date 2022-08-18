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
    // Route::post('edit-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('restore-user/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::get('user-force-delete/{id}', [ResortController::class, 'forceDelete'])->name('user.force-delete');


});



//Resort
Route::group(['middleware' => 'auth'], function() {
    Route::resource('resorts', ResortController::class)->except('show');
    Route::get('resorts/{id}/restore', [ResortController::class, 'restore'])->name('resorts.restore');
    Route::get('resorts/{id}/force-delete', [ResortController::class, 'forceDelete'])->name('resorts.force-delete');
});


// booking
Route::group(['middleware' => 'auth'], function() {
    Route::get('bookings', [BookingController::class, 'index'])->middleware('auth')->name('booking.index');
    Route::get('resorts/{resort}/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('resorts/{resort}/booking', [BookingController::class, 'store'])->name('booking.store');
});



