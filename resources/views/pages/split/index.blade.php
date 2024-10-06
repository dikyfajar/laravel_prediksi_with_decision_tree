@extends('layouts.app')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <div class="container">
                    <h3 class="page-title text-white bold">Split Data</h3>
                    <h6 class="page-category text-white">
                        Data akan dibagi sesuai dengan skala yang dipilih oleh pengguna (data yang ditampilkan merupakan
                        data training).
                    </h6>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start skala --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form id="split-form" action="{{ route('spliting') }}" method="POST">
                            @csrf
                            <div class="form-group row align-items-center">
                                <div class="col-lg-2 col-3">
                                    <label class="col-form-label" for="split_ratio">Pilih Skala Pembagian</label>
                                </div>
                                <div class="col-lg-4 col-9">
                                    <div class="input-group">
                                        <select name="split_ratio" id="split_ratio" class="form-control" required>
                                            <option selected>Pilih Skala...</option>
                                            {{-- @for ($i = 10; $i <= 90; $i += 10)
                                                <option value="{{ $i }}">{{ $i }}%</option>
                                            @endfor --}}
                                            <option value="90">10%</option>
                                            <option value="80">20%</option>
                                            <option value="70">30%</option>
                                            <option value="60">40%</option>
                                            <option value="50">50%</option>
                                            <option value="40">60%</option>
                                            <option value="30">70%</option>
                                            <option value="20">80%</option>
                                            <option value="10">90%</option>
                                        </select>
                                        <div class="input-group-prepend ml-2">
                                            <button class="btn btn-primary" type="submit">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start view data --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <!-- Tampilkan hasil data training -->
                {{-- @if (isset($trainingSamples) && isset($trainingLabels)) --}}
                @if (session()->has('trainingSamples') && session()->has('trainingLabels'))
                    <h3 class="card-title">Data Training</h3>
                    <p class="text">Hasil Pembagian Data <i><b>(untuk data testing berada pada menu akurasi)</b></i> </p>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" id="split-data">
                            <thead>
                                <tr>
                                    <th>Riwayat Sebelum</th>
                                    <th>Sekolah Asal</th>
                                    <th>Status Sekolah</th>
                                    <th>Jarak Tempuh</th>
                                    <th>Alasan Masuk Pondok</th>
                                    <th>Beasiswa</th>
                                    <th>Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('trainingSamples') as $index => $sample)
                                    <tr>
                                        <td>{{ $sample[0] }}</td>
                                        <td>{{ $sample[1] }}</td>
                                        <td>{{ $sample[2] }}</td>
                                        <td>{{ $sample[3] }}</td>
                                        <td>{{ $sample[4] }}</td>
                                        <td>{{ $sample[5] }}</td>
                                        <td>{{ session('trainingLabels')[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Data training belum tersedia. Silakan pilih skala pembagian dan proses data terlebih dahulu.</p>
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
    </div>
    {{-- end --}}
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#split-data').DataTable();
        })
    </script>
@endpush
