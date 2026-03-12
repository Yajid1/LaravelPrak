<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller extends \Illuminate\Routing\Controller
{
    public function index()
    {
        // Ambil username dari session untuk ditampilkan di navbar
        $username = session('username');
        return view('index', compact('username'));
    }
}