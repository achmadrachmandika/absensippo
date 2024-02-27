<?php

namespace App\Imports;

use App\Models\AbsenMasuk;
use Maatwebsite\Excel\Concerns\ToModel;

class MasukImport implements ToModel
{
    public function model(array $row)
    {
        return new AbsenMasuk([
            // Sesuaikan dengan kolom dan struktur data yang diimpor
            'column1' => $row[0],
            'column2' => $row[1],
            'column3' => $row[2],
            // ...
        ]);
    }
}
