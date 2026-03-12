<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('logged_in') === true) {
            return redirect()->route('index');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $validUsername = 'admin';
        $validPassword = 'password123';

        if ($request->username === $validUsername && $request->password === $validPassword) {
            $request->session()->put('logged_in', true);
            $request->session()->put('username', $request->username);
            $request->session()->save();

            return redirect()->route('index');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}