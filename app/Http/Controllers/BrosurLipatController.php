<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrosurLipatController extends Controller
{
    public function index()
    {
        return view('frontend.brosur-lipat');
    }
}
