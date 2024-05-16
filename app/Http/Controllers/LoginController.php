<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        /* if (\Auth::check()) {
            return redirect("/posts");
        } */

        return view("admin/login/index");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:30',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect('/home');
        }

        return Redirect::back()->withErrors("用户名密码错误");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
