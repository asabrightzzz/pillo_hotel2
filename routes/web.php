<?php

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/guest', 'guest');

Route::view('/employees' , 'employees');
Route::view('/facility' , 'facility');

Route::resource('/reservation', ReservationController::class);