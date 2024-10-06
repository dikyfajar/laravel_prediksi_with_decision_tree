<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\DecisionTree;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Metric\Accuracy;
use Phpml\ModelManager;

class AkurasiController extends Controller
{
    // index
    public function index()
    {
        // Load model yang tersimpan
        $modelManager = new ModelManager();
        $classifier = $modelManager->restoreFromFile(storage_path('decision_tree_model.model'));

        // Data Testing
        $testingSamples = session('testingSamples');
        $testingLabels = session('testingLabels');

        // Lakukan prediksi pada data testing
        $predictedLabels = [];
        foreach ($testingSamples as $sample) {
            $predictedLabels[] = $classifier->predict($sample);
        }

        // Hitung akurasi
        $accuracy = Accuracy::score($testingLabels, $predictedLabels);

        // Tampilkan akurasi ke view
        return view('pages.akurasi.index', [
            'testingSamples' => $testingSamples,
            'testingLabels' => $testingLabels,
            'accuracy' => $accuracy
        ]);

        // // Ambil data testing dari session
        // $testingSamples = session('testingSamples');
        // $testingLabels = session('testingLabels');

        // // Cek apakah ada data testing di session
        // if ($testingSamples && $testingLabels) {
        //     return view('pages.akurasi.index', [
        //         'testingSamples' => $testingSamples,
        //         'testingLabels' => $testingLabels,
        //     ]);
        // }

        // return redirect()->back()->with('error', 'Data testing tidak ditemukan.');
    }
}
