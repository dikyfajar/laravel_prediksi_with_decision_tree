<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Classification\DecisionTree;
use Phpml\ModelManager;
use Phpml\Tree\Node\LeafNode;
use Phpml\Tree\Node\DecisionNode;

class PrediksiController extends Controller
{
    // index
    public function index()
    {
        return view("pages.prediksi.index");
    }

    public function predict(Request $request)
    {
        // Ambil input dari form prediksi
        $inputData = $request->validate([
            'riwayat' => 'required|string',
            'asal' => 'required|string',
            'status' => 'required|string',
            'jarak' => 'required|string',
            'alasan' => 'required|string',
            'beasiswa' => 'required|string',
        ]);

        // Load trained model Decision Tree
        $modelManager = new ModelManager();
        $classifier = $modelManager->restoreFromFile(storage_path('decision_tree_model.model'));

        // Format input data menjadi array
        $sample = [
            $inputData['riwayat'],
            $inputData['asal'],
            $inputData['status'],
            $inputData['jarak'],
            $inputData['alasan'],
            $inputData['beasiswa']
        ];

        // Prediksi hasil berdasarkan input
        $predictedLabel = $classifier->predict($sample);

        // Generate rules dalam bentuk string IF-THEN
        // $rules = $this->extractRules($classifier);

        // Kembalikan hasil prediksi dan rules ke view
        return view('pages.prediksi.index', [
            'predictedLabel' => $predictedLabel,
            'inputData' => $inputData,
            // 'rules' => $rules,
        ]);
    }

    // // Method untuk ekstraksi rules
    // private function extractRules($classifier)
    // {
    //     $rules = [];

    //     // Try to get root node of the tree and traverse it
    //     $rootNode = $classifier->getRoot(); // Replace with actual method to get tree root in PHP-ML
    //     if ($rootNode) {
    //         $this->traverseTree($rootNode, $rules);
    //     }

    //     return implode("\n", $rules); // Gabungkan rules jadi string
    // }

    // private function traverseTree($node, &$rules, $depth = 0, $rule = "")
    // {
    //     // Jika node adalah leaf (daun), tambahkan rule
    //     if ($node instanceof LeafNode) {
    //         $rules[] = str_repeat("  ", $depth) . "IF " . $rule . " THEN " . $node->class;
    //     } elseif ($node instanceof DecisionNode) {
    //         // Jika node adalah decision node, pecah menjadi 2 cabang
    //         $leftRule = $rule . " feature[" . $node->featureIndex . "] <= " . $node->value;
    //         $rightRule = $rule . " feature[" . $node->featureIndex . "] > " . $node->value;

    //         $this->traverseTree($node->leftChild, $rules, $depth + 1, $leftRule);
    //         $this->traverseTree($node->rightChild, $rules, $depth + 1, $rightRule);
    //     }
    // }
}
