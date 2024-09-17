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
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label" for="skala">Pilih Skala Pembagian</label>
                            </div>
                            <div class="col-lg-2 col-9">
                                <select name="skala" id="skala" class="form-control">
                                    <option selected>Pilih Skala...</option>
                                    <option value="0.1">10%</option>
                                    <option value="0.2">20%</option>
                                    <option value="0.3">30%</option>
                                    <option value="0.4">40%</option>
                                    <option value="0.5">50%</option>
                                    <option value="0.6">60%</option>
                                    <option value="0.7">70%</option>
                                    <option value="0.8">80%</option>
                                    <option value="0.9">90%</option>
                                </select>
                            </div>
                        </div>
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
            </div>
        </div>
    </div>
    {{-- end --}}
@endsection
