<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//homepage resort
Route::get('/', HomepageController::class)->name('homepage');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//user
Route::get('/view-user', [UserController::class, 'view']);
Route::get('add-user', [UserController::class, 'create']);
Route::post('store-user', [UserController::class, 'store']);
Route::get('delete-user/{id}', [UserController::class, 'delete']);
Route::get('edit-user/{id}', [UserController::class, 'showData']);
Route::post('edit-user', [UserController::class, 'update']);


//Resort
Route::get('view-resort', [ResortController::class, 'index'])->name('resort.view');
Route::get('add-resort', [ResortController::class, 'create'])->name('resort.create');
Route::post('store-resort', [ResortController::class, 'store'])->name('resort.store');
Route::get('delete-resort/{id}', [ResortController::class, 'destroy']);
Route::get('edit-resort/{id}', [ResortController::class, 'show']);
Route::post('edit-resort/{id}', [ResortController::class, 'update'])->name('resort.update');


// booking
Route::get('bookings', [BookingController::class, 'index'])->name('booking.index');
Route::get('resorts/{resort}/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('resorts/{resort}/booking', [BookingController::class, 'store'])->name('booking.store');

