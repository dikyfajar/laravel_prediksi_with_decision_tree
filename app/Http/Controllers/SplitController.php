<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SplitController extends Controller
{
    // index
    public function index()
    {
        return view("pages.split.index");
    }
}
