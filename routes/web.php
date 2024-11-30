<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('LoginPage', 'LoginPage')->name('LoginPage');
