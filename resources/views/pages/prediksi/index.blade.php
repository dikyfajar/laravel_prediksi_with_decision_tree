@extends('layouts.app')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <div class="container">
                    <h3 class="page-title text-white bold">Prediksi Data</h3>
                    <h6 class="page-category text-white">
                        Pengguna dapat melakukan prediksi data dengan mengisi kriteria yang telah ditetapkan.
                    </h6>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start input --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('predict') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- baris kiri --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="riwayat">Riwayat Sebelum :</label>
                                <select required class="form-control" name="riwayat" id="riwayat">
                                    <option value="" selected>Pilih...</option>
                                    <option value="DI PESANTREN">DI PESANTREN</option>
                                    <option value="BERSAMA ORANG TUA">BERSAMA ORANG TUA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="asal">Sekolah Asal :</label>
                                <select required class="form-control" name="asal" id="asal">
                                    <option value="" selected>Pilih...</option>
                                    <option value="SMP">SMP</option>
                                    <option value="MTS">MTS</option>
                                    <option value="SMPN">SMPN</option>
                                    <option value="MTSN">MTSN</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Sekolah :</label>
                                <select required class="form-control" name="status" id="status">
                                    <option value="" selected>Pilih...</option>
                                    <option value="SWASTA">SWASTA</option>
                                    <option value="NEGERI">NEGERI</option>
                                </select>
                            </div>
                        </div>
                        {{-- baris kanan --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jarak">Jarak Tempuh :</label>
                                <select required class="form-control" name="jarak" id="jarak">
                                    <option value="" selected>Pilih...</option>
                                    <option value="DEKAT">DEKAT</option>
                                    <option value="SEDANG">SEDANG</option>
                                    <option value="JAUH">JAUH</option>
                                    <option value="SANGAT JAUH">SANGAT JAUH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alasan">Alasan Masuk Pondok :</label>
                                <select required class="form-control" name="alasan" id="alasan">
                                    <option value="" selected>Pilih...</option>
                                    <option value="KEINGINAN PRIBADI">KEINGINAN PRIBADI</option>
                                    <option value="KEINGINAN ORANG TUA">KEINGINAN ORANG TUA</option>
                                    <option value="IKUT TEMAN">IKUT TEMAN</option>
                                    <option value="REKOMENDASI PENGASUH">REKOMENDASI PENGASUH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="beasiswa">Beasiswa :</label>
                                <select required class="form-control" name="beasiswa" id="beasiswa">
                                    <option value="" selected>Pilih...</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end mt-1">
                                <button type="reset" class="btn btn-light-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary ml-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Hasil dari Rules dan Prediksi --}}
        {{-- @if (isset($rules) && isset($predictedLabel)) --}}
        @if (isset($predictedLabel))
            {{-- <div class="card-body">
                <h4 class="card-title">Aturan dari Model Decision Tree</h4>
                <pre>{{ $rules }}</pre>
            </div> --}}
            <div class="card">
                <div class="card-body">
                    {{-- Hasil Prediksi --}}
                    <h4 class="card-title">Hasil Prediksi</h4>
                    <p>Hasil prediksi berdasarkan input yang diberikan adalah: <strong>{{ $predictedLabel }}</strong></p>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Prediksi Belum Diproses
            </div>
        @endif
    </div>
    {{-- end --}}
@endsection
