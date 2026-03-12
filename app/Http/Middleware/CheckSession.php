<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        // Debug: uncomment baris ini kalau masih error
        // dd(session()->all());

        if (!session()->has('logged_in') || session('logged_in') !== true) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}