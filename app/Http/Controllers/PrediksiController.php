<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    // index
    public function index()
    {
        return view("pages.prediksi.index");
    }
}
