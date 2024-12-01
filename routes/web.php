<?php

use Illuminate\Support\Facades\Route;

// Import controller
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Default route untuk semua page
Route::view('LoginPage', 'LoginPage')->name('LoginPage');
Route::view('RegisterPage', 'RegisterPage')->name('RegisterPage');
Route::view('LupaPasswordPage', 'LupaPasswordPage')->name('LupaPasswordPage');
Route::view('MainPage', 'MainPage')->name('MainPage');

// post route
Route::post('RegisterPage', [UserController::class, 'Register']);
Route::post('LoginPage', [UserController::class, 'Login']);
Route::post('LupaPasswordPage', [UserController::class, 'LupaPassword']);
