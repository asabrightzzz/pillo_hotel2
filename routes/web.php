<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoryController;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/guest', 'guest');

    Route::resource('guest', GuestController::class);
    Route::resource('facility', FacilityController::class);
    Route::resource('reservation', ReservationController::class); 
    Route::resource('room', RoomController::class); 
    Route::view('/', 'layout')->name('home');
    Route::resource('employee', EmployeeController::class);
<<<<<<< HEAD
    Route::get('/roomcategories', [RoomCategoriesController::class, 'index']);
    Route::get('/roomcategories/{roomcategories}/edit', [RoomCategoriesController::class, 'edit']);
    Route::put('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'update']);
    Route::delete('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'destroy']);
    Route::post('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'store']);
});
=======
    Route::get('/roomcategories', [RoomCategoryController::class, 'index']);
    Route::get('/roomcategories/{roomcategories}/edit', [RoomCategoryController::class, 'edit']);
    Route::put('/roomcategories/{roomcategories}', [RoomCategoryController::class, 'update']);
    Route::delete('/roomcategories/{roomcategories}', [RoomCategoryController::class, 'destroy']);
    Route::post('/roomcategories/{roomcategories}', [RoomCategoryController::class, 'store']);

>>>>>>> abdbec962b308ae36c34a6b80e5b57be5662485e

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

Route::resource('/room_category', RoomCategoryController::class);
