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

        return redirect('LoginPage');
    }
}
