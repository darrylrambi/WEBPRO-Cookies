<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tm_user;


class UserController extends Controller
{
    //
    function Register(Request $request) {
        $request->session()->put('Email', $request->input('Email'));
        $request->session()->put('Password', $request->input('Password'));

        tm_user::create([
            'Email' => session('Email'),
            'Password' => session('Password')
        ]);

        return redirect('LoginPage')->with('Registrasi berhasil!');
    }

    function Login(Request $request) {
        $request->session()->put('Email', $request->input('Email'));
        $request->session()->put('Password', $request->input('Password'));

        // check RememberMe
        $remember = request->has('RememberMe');

        if ($remember) {
            // isi cookie kalo RememberMe
            setcookie("Email", session('Email'), time()+3600);
            setcookie("Password", session('Password'), time()+3600);
        } else {
            // Kosongkan cookie kalo tidak RememberMe
            setcookie("Email", "");
            setcookie("Password", "");
        }

        return redirect('MainPage')->with('Login berhasil!');
    }
}
