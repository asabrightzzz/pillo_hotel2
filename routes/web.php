<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoriesController;
use App\Models\RoomCategories;
use App\Models\Reservation;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Models\Guest;



// fasilitas
  Route::prefix('app')->name('app.')->group(function() {

    Route::resource('guest', GuestController::class);
    Route::resource('facility', FacilityController::class);
    Route::resource('reservation', ReservationController::class); 
    Route::view('/', 'layout')->name('home');
    Route::resource('employee', EmployeeController::class);
    
});
=======

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/guest', 'guest');

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
>>>>>>> f39f8339dc7c34d586175dbd49c46065d99089bf



Route::get('/roomcategories', [RoomCategoriesController::class, 'index']);
Route::get('/roomcategories/{roomcategories}/edit', [RoomCategoriesController::class, 'edit']);
Route::put('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'update']);
Route::delete('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'destroy']);
Route::post('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'store']);
