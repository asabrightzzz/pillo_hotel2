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

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('app')->name('.app')->group(function () {
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
    Route::resource('roomcategory', RoomCategoryController::class);


});