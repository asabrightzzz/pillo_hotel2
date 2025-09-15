<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;
use App\Models\Guest;



// fasilitas
Route::prefix('app')->name('app.')->group(function () {
    Route::resource('facility', FacilityController::class);
    Route::resource('reservation', ReservationController::class); 
    Route::view('/', 'layout')->name('home');
    Route::resource('employee', EmployeeController::class);
});



