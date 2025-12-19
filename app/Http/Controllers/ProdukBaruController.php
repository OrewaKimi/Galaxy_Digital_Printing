<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukBaruController extends Controller
{
    public function index()
    {
        return view('frontend.produk-baru');
    }
}
