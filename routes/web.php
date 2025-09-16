<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoryController;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('Dashboards')->group(function () {
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/facility', FacilityController::class);
    Route::resource('/guest', GuestController::class);
    Route::resource('/room_category', RoomCategoryController::class);
    Route::resource('/reservation', ReservationController::class);
});
