<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller
{
    public function login(){
        return view('forms.login');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('projects');
        }

        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
