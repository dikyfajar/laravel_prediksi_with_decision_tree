<?php

namespace App\Imports;

use App\Models\Label;
use App\Models\Sample;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Simpan data sample
        $sample = Sample::create([
            'riwayat'               => $row['riwayat_sebelum_smama'],
            'sekolah_asal'          => $row['sekolah_asal'],
            'status_sekolah'        => $row['status'],
            'jarak_tempuh'          => $row['jarak_tempuh'],
            'alasan_masuk_pondok'   => $row['alasan_masuk_ponpes'],
            'beasiswa'              => $row['beasiswa'],
        ]);

        // Simpan label yang terkait dengan sample
        Label::create([
            'sample_id' => $sample->id,
            'label'     => $row['keputusan'],
        ]);
    }
}
