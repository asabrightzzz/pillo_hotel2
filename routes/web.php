<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layout')->name('home');

Route::view('/facilities', 'facilities')->name('facilities');
