@extends('layouts.app')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner">
            {{-- header --}}
            <div class="page-header">
                <div class="container">
                    <h3 class="page-title text-white bold">Master Data</h3>
                    <h6 class="page-category text-white">
                        Silakan unggah file excel sebagai dataset untuk dijadikan master data.
                    </h6>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start input file --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="updata"><i>Upload dataset</i></label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="file" name="file" accept=".xls,.xlsx"
                                required>
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="submit">Unggah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- start view data --}}
    <div class="page-inner mt--5">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tabel Data</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="all-data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Riwayat Sebelum</th>
                                <th>Sekolah Asal</th>
                                <th>Status Sekolah</th>
                                <th>Jarak Tempuh</th>
                                <th>Alasan Masuk Pondok</th>
                                <th>Beasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($samples as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->riwayat }}</td>
                                    <td>{{ $s->sekolah_asal }}</td>
                                    <td>{{ $s->status_sekolah }}</td>
                                    <td>{{ $s->jarak_tempuh }}</td>
                                    <td>{{ $s->alasan_masuk_pondok }}</td>
                                    <td>{{ $s->beasiswa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#all-data').DataTable();
        });
    </script>
@endpush
