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

Route::prefix('app')->name('app.') ->group(function () {
  // guest
    Route::resource('guest', GuestController::class);
    // Facility
    Route::resource('facility', FacilityController::class);
    // Reservation
    Route::resource('reservation', ReservationController::class); 
    // Room
    Route::resource('room', RoomController::class); 
    // base
    Route::view('/', 'layout')->name('home');
    // employee
    Route::resource('employee', EmployeeController::class);
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
