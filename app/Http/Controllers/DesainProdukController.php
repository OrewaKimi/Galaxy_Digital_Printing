<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesainProdukController extends Controller
{
    public function index()
    {
        return view('frontend.desain-produk');
    }
}
