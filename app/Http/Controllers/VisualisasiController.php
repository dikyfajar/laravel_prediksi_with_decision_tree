<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\DecisionTree;
use Phpml\ModelManager;

class VisualisasiController extends Controller
{
    // index
    public function index()
    {
        // Load trained model Decision Tree
        $modelManager = new ModelManager();
        $classifier = $modelManager->restoreFromFile(storage_path('decision_tree_model.model'));
        // $rules = $classifier->export();

        // return view("pages.visualisasi.index", compact('rules'));
        return view("pages.visualisasi.index");
    }

    // public function visualizeTree()
    // {
    //     // Ambil model yang sudah dilatih
    //     $modelPath = storage_path('app/public/decision_tree_model.model');
    //     $modelManager = new ModelManager();
    //     $classifier = $modelManager->restoreFromFile($modelPath);

    //     // Generate dot file untuk Graphviz
    //     $dotContent = $classifier->exportToDot();

    //     // Simpan file .dot di storage
    //     $dotFilePath = storage_path('decision_tree.dot');
    //     file_put_contents($dotFilePath, $dotContent);

    //     // Gunakan Graphviz untuk menghasilkan gambar dari file .dot
    //     $outputImagePath = storage_path('decision_tree.png');
    //     $command = "dot -Tpng {$dotFilePath} -o {$outputImagePath}";
    //     exec($command);

    //     // Kembalikan view dengan gambar pohon keputusan
    //     return view('pages.visualization', [
    //         'treeImage' => asset('storage/decision_tree.png')
    //     ]);
    // }
}
