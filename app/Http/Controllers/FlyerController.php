<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlyerController extends Controller
{
    public function index()
    {
        return view('frontend.flyer');
    }
}
