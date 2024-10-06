@extends('layouts.app')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <div class="container">
                    <h3 class="page-title text-white bold">Akurasi Data</h3>
                    <h6 class="page-category text-white">
                        Akurasi yang dihasilkan berasal dari data testing yang telah ditentukan.
                    </h6>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start tabel --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Hasil Akurasi</h3>
                @if (isset($accuracy))
                    <h5><i>Akurasi Model: <strong>{{ $accuracy * 100 }}%</strong></i></h5>
                @else
                    <p class="text-danger">Data tidak tersedia untuk menghitung akurasi.</p>
                @endif
            </div>
            <div class="card-body">
                @if (session()->has('testingSamples') && session()->has('testingLabels') && session()->has('predictedLabels'))
                    <h3 class="card-title">Data Testing</h3>
                    <p class="text">Hasil Pembagian Data Testing</p>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" id="testing-data">
                            <thead>
                                <tr>
                                    <th>Riwayat Sebelum</th>
                                    <th>Sekolah Asal</th>
                                    <th>Status Sekolah</th>
                                    <th>Jarak Tempuh</th>
                                    <th>Alasan Masuk Pondok</th>
                                    <th>Beasiswa</th>
                                    <th>Label Asli</th>
                                    <th>Label Prediksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('testingSamples') as $index => $sample)
                                    <tr>
                                        <td>{{ $sample[0] }}</td>
                                        <td>{{ $sample[1] }}</td>
                                        <td>{{ $sample[2] }}</td>
                                        <td>{{ $sample[3] }}</td>
                                        <td>{{ $sample[4] }}</td>
                                        <td>{{ $sample[5] }}</td>
                                        <td>{{ session('testingLabels')[$index] }}</td>
                                        <td>{{ session('predictedLabels')[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tampilkan nilai akurasi -->
                    {{-- <h4 class="mt-4">Akurasi Model: {{ session('accuracy') * 100 }}%</h4> --}}
                @else
                    <p class="alert alert-danger">Data testing atau akurasi tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
    {{-- end --}}
@endsection

@push('js')
    <script>
        $('document').ready(function() {
            $('#testing-data').DataTable();
        })
    </script>
@endpush
