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
Route::get('/', HomepageController::class);


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
Route::get('view-resort', [ResortController::class, 'index']);
Route::get('add-resort', [ResortController::class, 'create']);
Route::post('store-resort', [ResortController::class, 'store']);
Route::get('delete-resort/{id}', [ResortController::class, 'destroy']);
Route::get('edit-resort/{id}', [ResortController::class, 'show']);
Route::post('edit-resort', [ResortController::class, 'update']);




//booking
Route::get('create_booking', function () {
    return view('booking');
});
Route::get('view-booking', [BookingController::class, 'view']);
Route::post('resorts/{$resort->id}/add-booking', [BookingController::class, 'add'])->name('add_booking');

