<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasController extends Controller
{
    public function index()
    {
        return view('frontend.tas');
    }
}
