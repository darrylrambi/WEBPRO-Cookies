<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tm_user;


class UserController extends Controller
{
    //
    function Register() {
        $request->session()->put('Email', $request->input('Email'));
        $request->session()->put('Password', $request->input('Password'));

        

        return redirect('LoginPage');
    }
}
