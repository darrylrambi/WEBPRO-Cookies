<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Default route untuk semua page
Route::view('LoginPage', 'LoginPage')->name('LoginPage');
Route::view('RegisterPage', 'RegisterPage')->name('RegisterPage');
Route::view('LupaPasswordPage', 'LupaPasswordPage')->name('LupaPasswordPage');
Route::view('MainPage', 'MainPage')->name('MainPage');


