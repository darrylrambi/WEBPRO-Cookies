<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tm_user;


class UserController extends Controller
{
    //
    function Register(Request $request) {
        $request->session()->put('RegisterEmail', $request->input('RegisterEmail'));
        $request->session()->put('RegisterPassword', $request->input('RegisterPassword'));

        tm_user::create([
            'Email' => session('RegisterEmail'),
            'Password' => session('RegisterPassword')
        ]);

        return redirect('LoginPage')->with('Registrasi berhasil!');
    }

    function Login(Request $request) {
        $request->session()->put('LoginEmail', $request->input('LoginEmail'));
        $request->session()->put('LoginPassword', $request->input('LoginPassword'));

        // check RememberMe
        $remember = $request->has('RememberMe');

        if ($remember) {
            // isi cookie kalo RememberMe
            setcookie("LoginEmail", session('LoginEmail'), time()+3600); // set cookie sejam
            setcookie("LoginPassword", session('LoginPassword'), time()+3600); // set cookie sejam
        } else {
            // Kosongkan cookie kalo tidak RememberMe
            setcookie("LoginEmail", "");
            setcookie("LoginPassword", "");
        }

        return redirect('MainPage')->with('Login berhasil!');
    }

    public function ShowUsers()
    {
        $users = tm_user::all();
        return redirect('MainPage', compact('users'));
    }
}
