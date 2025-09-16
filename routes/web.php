<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GuestController;
use App\Models\RoomCategory;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;


Route::prefix('app')->name('app.') ->group(function () {
Route::view('/', 'layout')->name('home');
  // guest
    Route::resource('guest', GuestController::class);
    // Facility
    Route::resource('facility', FacilityController::class);
    // Reservation
    Route::resource('reservation', ReservationController::class);
    // Room
    Route::resource('room', RoomController::class);
    // employee
    Route::resource('employee', EmployeeController::class);
    // Room Category
    Route::resource('room_category', RoomCategoryController::class);
});

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
