<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use App\Models\Employee;
use App\Http\Controllers\Admin\FacilitiesController;
use Illuminate\Support\Facades\Route;
use App\Models\Guest;

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/guest', 'guest');

Route::resource('/employee', EmployeeController::class);

<<<<<<< HEAD
Route::view('/facility' , 'facility');
Route::view('/facility', 'facility.facility');
=======
Route::view('/employees' , 'employees');

// Kelompok rute fasilitas
Route::prefix('manage')->name('manage.')->group(function () {
    Route::resource(' facilities', FacilitiesController::class);
     Route::view('/static-facility', 'facilities.facility')->name('static-facility');
});
>>>>>>> 2af6796b127961c34e5e2a20477319b612ae17f9

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
