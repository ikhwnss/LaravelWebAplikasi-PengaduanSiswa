<?php

namespace App\Imports;

use App\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, SkipsOnError, WithHeadingRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nama_depan'  => $row['nama_depan'],
            'nama_belakang' => $row['nama_belakang'],
            'nis'    => $row['nis'],
            'nomor_telepon' => $row['nomor_telepon'],
            'alamat_rumah' => $row['alamat_rumah'],
            'email' => $row['email'],
            'photo' => $row['photo']
        ]);
    }

    /**
     * @param \Throwable $e
     */
    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
