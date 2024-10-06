<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Phpml\Classification\DecisionTree;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\ArrayDataset;
use Phpml\Metric\Accuracy;
use Phpml\ModelManager;

class SplitController extends Controller
{
    // index
    public function index()
    {
        return view("pages.split.index");
    }

    // split data
    public function split(Request $request)
    {
        // Ambil persentase pembagian data
        $splitRatio = $request->input('split_ratio') / 100;

        // Ambil data dari database
        $samples = DB::table('samples')->select('riwayat', 'sekolah_asal', 'status_sekolah', 'jarak_tempuh', 'alasan_masuk_pondok', 'beasiswa')->get()->toArray();
        $labels = DB::table('labels')->select('label')->get()->pluck('label')->toArray();

        // Convert data ke format yang sesuai untuk PHP-ML
        $samples = array_map(function ($sample) {
            return [
                (string) $sample->riwayat,
                (string) $sample->sekolah_asal,
                (string) $sample->status_sekolah,
                (string) $sample->jarak_tempuh,
                (string) $sample->alasan_masuk_pondok,
                (string) $sample->beasiswa
            ];
        }, $samples);

        // Buat dataset dari samples dan labels
        $dataset = new ArrayDataset($samples, $labels);

        // Split data menggunakan RandomSplit
        $split = new RandomSplit($dataset, $splitRatio);

        // Data Training
        $trainingSamples = $split->getTrainSamples();
        $trainingLabels = $split->getTrainLabels();

        // Data Testing
        $testingSamples = $split->getTestSamples();
        $testingLabels = $split->getTestLabels();

        // Latih model Decision Tree
        $classifier = new DecisionTree();
        $classifier->train($trainingSamples, $trainingLabels);


        // Simpan model ke dalam file setelah terlatih
        $modelManager = new ModelManager();
        $modelManager->saveToFile($classifier, storage_path('decision_tree_model.model'));

        // Prediksi menggunakan data testing
        $predictedLabels = $classifier->predict($testingSamples);

        // // Hitung akurasi prediksi terhadap data testing
        // $accuracy = Accuracy::score($testingLabels, $predictedLabels);

        // Simpan hasil ke dalam session, simpan dalam array untuk menjaga kedua variabel
        session([
            'trainingSamples' => $trainingSamples,
            'trainingLabels' => $trainingLabels,
            'testingSamples' => $testingSamples,
            'testingLabels' => $testingLabels,
            'predictedLabels' => $predictedLabels,
            // 'accuracy' => $accuracy,
        ]);

        // Kembalikan hasil data training ke view
        return view('pages.split.index', [
            'trainingSamples' => $trainingSamples,
            'trainingLabels' => $trainingLabels,
            // 'splitRatio' => $splitRatio * 100
        ]);
    }

    public function trainModel(Request $request)
    {
        // Ambil data training dari session (yang sudah displit sebelumnya)
        $trainingSamples = session('trainingSamples');
        $trainingLabels = session('trainingLabels');

        // Latih model Decision Tree
        $classifier = new DecisionTree(5); // 5 adalah maxDepth
        $classifier->train($trainingSamples, $trainingLabels);

        // Simpan model di storage untuk nanti digunakan dalam visualisasi
        $modelManager = new ModelManager();
        $modelPath = storage_path('app/public/decision_tree_model.model');
        $modelManager->saveToFile($classifier, $modelPath);

        // Redirect ke halaman visualisasi setelah training
        return redirect()->route('visualize_tree');
    }
}
