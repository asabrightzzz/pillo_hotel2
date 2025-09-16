<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomCategoriesController;
use App\Models\RoomCategories;
use App\Models\Reservation;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Models\Guest;



// fasilitas
  Route::prefix('app')->name('app.')->group(function() {

    Route::resource('guest', GuestController::class);
    Route::resource('facility', FacilityController::class);
    Route::resource('reservation', ReservationController::class); 
    Route::view('/', 'layout')->name('home');
    Route::resource('employee', EmployeeController::class);
    Route::get('/roomcategories', [RoomCategoriesController::class, 'index']);
    Route::get('/roomcategories/{roomcategories}/edit', [RoomCategoriesController::class, 'edit']);
    Route::put('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'update']);
    Route::delete('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'destroy']);
    Route::post('/roomcategories/{roomcategories}', [RoomCategoriesController::class, 'store']);
});



