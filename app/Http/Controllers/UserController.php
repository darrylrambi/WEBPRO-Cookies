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
        $validateUser = tm_user::where('Email', $request->input('LoginEmail'))->first();

        // pake validateUer untuk cek password input sama atau tidak dengan yang ada di database
        if ($validateUser && $validateUser->Password == $request->input('LoginPassword')) {
            // check RememberMe
            $remember = $request->has('RememberMe');

            // simpan input ke session
            $request->session()->put('LoginEmail', $request->input('LoginEmail'));
            $request->session()->put('LoginPassword', $request->input('LoginPassword'));

            if ($remember) {
                // isi cookie dengan session yang sudah disimpan kalo RememberMe
                setcookie("LoginEmail", session('LoginEmail'), time()+3600); // set cookie expire sejam
                setcookie("LoginPassword", session('LoginPassword'), time()+3600); // set cookie expire sejam
            } else {
                // Kosongkan cookie kalo tidak RememberMe
                setcookie("LoginEmail", "");
                setcookie("LoginPassword", "");
            }

            // simpan user dari database ke session
            // nanti di show pake session di mainpage
            $users = tm_user::all();
            session(['users' => $users]);

            return redirect('MainPage');
        } else {
            return redirect()->back()->withErrors(['LoginError' => 'Email atau Password salah!']);
        }
    }

    function LupaPassword(Request $request) {
        // cari email user di database
        $findUser = tm_user::find($request->input('LupaPasswordEmail'));

        // pake findUser untuk ganti password sesuai email yang ada di database
        if ($findUser) {

            $findUser->update([
                'Email' => $request->input('LupaPasswordEmail'),
                'Password' => $request->input('PasswordBaru'), 
            ]);

            return redirect('LoginPage')->with('GantiPassword', 'Berhasil ganti Password!');
        } else {
            return redirect()->back()->withErrors(['GantiPasswordError' => 'Email tidak terdaftar!']);
        }
    }
}
