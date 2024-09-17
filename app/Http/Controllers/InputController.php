<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Sample;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InputController extends Controller
{
    // index
    public function index()
    {
        $samples = Sample::all();
        return view('pages.input.index', compact('samples'));
    }

    public function upload(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Import data dari file Excel dan simpan ke database
        Excel::import(new DataImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diupload dan disimpan!');
    }
}
