<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualisasiController extends Controller
{
    // index
    public function index()
    {
        return view("pages.visualisasi.index");
    }
}
