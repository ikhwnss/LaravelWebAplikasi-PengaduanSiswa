<?php

namespace App\Imports;

use App\Pelanggaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelanggaranImport implements ToModel, SkipsOnError, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pelanggaran([
            'id_tata_tertib'  => $row['id_tata_tertib'],
            'nama' => $row['nama'],
            'detail'    => $row['detail'],
            'poin' => $row['poin'],
            'kategori' => $row['kategori'],
            'sanksi' => $row['sanksi']
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
