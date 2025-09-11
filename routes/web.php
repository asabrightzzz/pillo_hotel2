<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/guest', function () {
    return view('guest');
});

Route::get('/employees', function () {
    return view('employees');
});
