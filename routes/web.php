<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

Route::get('/', function () {
    return view('facilities');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('guest');
});

Route::get('/employees', function () {
    return view('employees');
});
