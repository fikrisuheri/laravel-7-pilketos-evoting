<?php

namespace App\Imports;

use App\Pemilih;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
class PemilihImport implements ToModel
{
    public function model(array $row)
    {
        return new Pemilih([
            'name'  => $row[0],
            'npm' => $row[1],
            'jurusan' => $row[2],
            'fakultas' => $row[2],
            'password' => Str::random(6),
        ]);
    }
}
