<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoriesController;
use App\Models\RoomCategories;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/guest', 'guest');

Route::view('/employees' , 'employees');
Route::view('/facility' , 'facility');

// Satu Kesatuan dari semua method untuk kebutuhan CRUD
Route::resource('/reservation', ReservationController::class);

// Menampilkan halaman utama
// Route::get('/reservation', [ReservationController::class, 'index']);
// Menampilkan halaman edit dengan data reservation
// Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit']);
// Update data reservation
// Route::put('/reservation/{reservation}', [ReservationController::class, 'update']);
// Delete data
// Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy']);
// Store data atau insert data
// Route::post('/reservation/{reservation}', [ReservationController::class, 'store']);

Route::resource('/roomcategories', RoomCategoriesController::class);


Route::get('/roomcategories', [RoomCategoriesController::class, 'index']);

Route::get('/roomcategories/{roomCategories}/edit', [RoomCategoriesController::class, 'edit']);

Route::put('/roomcategories/{roomCategories}', [RoomCategoriesController::class, 'update']);

Route::delete('/roomcategories/{roomCategories}', [RoomCategoriesController::class, 'destroy']);

Route::post('/roomcategories', [RoomCategoriesController::class, 'store']);
