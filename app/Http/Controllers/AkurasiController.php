<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkurasiController extends Controller
{
    // index
    public function index()
    {
        return view("pages.akurasi.index");
    }
}
