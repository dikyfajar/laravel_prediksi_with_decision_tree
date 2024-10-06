@extends('layouts.app')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <div class="container">
                    <h3 class="page-title text-white bold">Visualisasi Data</h3>
                    <h6 class="page-category text-white">
                        Hasil visualisasi pohon keputusan dari model yang terbentuk berasal dari data training.
                    </h6>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start gambar --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                @if (isset($treeImage))
                    <img src="{{ $treeImage }}" alt="Decision Tree Visualization" class="img-fluid">
                @else
                    <div class="alert alert-danger">Pohon keputusan tidak tersedia. Silakan latih model terlebih dahulu.
                    </div>
                @endif
            </div>
            @if (isset($rules))
                <div class="card-body">
                    {{-- Rules --}}
                    <h4 class="card-title">Aturan dari Model Decision Tree</h4>
                    <pre>{{ $rules }}</pre> {{-- Tampilkan rules dalam format IF-THEN --}}
                </div>
            @endif
        </div>
    </div> {{-- end --}}
@endsection
