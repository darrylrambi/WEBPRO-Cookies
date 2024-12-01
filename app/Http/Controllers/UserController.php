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

        return redirect('LoginPage')->with('Berhasil','Registrasi berhasil!');
    }

    function Login(Request $request) {
        // check email di database
        $validateEmail = tm_user::where('Email', $request->input('LoginEmail'))->first();

        if ($validateEmail && Hash::check($request->input('LoginPassword'), $user->Password)) {
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

            // simpan user dari database ke session
            // nanti di show pake session di mainpage
            $users = tm_user::all();
            session(['users' => $users]);

            return redirect('MainPage')->with('Login berhasil!');
        } else {
            return redirect()->back()->withErrors(['LoginError' => 'Email atau Password salah!']);
        }
    }
}
