<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PapanTandaController extends Controller
{
    public function index()
    {
        return view('frontend.papan-tanda');
    }
}
