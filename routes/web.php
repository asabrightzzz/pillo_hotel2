<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

Route::get('/', function () {
    return view('facilities');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/guest', 'guest');

Route::view('/employees' , 'employees');

Route::resource('/reservation', ReservationController::class);