<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('skins.auth.login');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')->with('message', 'Succesfully LogeedIn');
        } else {
            return redirect()->route('login.form')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login.form')->with('message', 'Sign out Successfully');
    }
}
