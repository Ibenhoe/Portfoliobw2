<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HOmeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
