<?php

namespace App\Imports;

use App\Models\ModelAbsensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AbsensiImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ModelAbsensi([
            'nama' => $row[0],
            'tanggal' => date('d/m/Y', ($row[1] - 25569) * 86400),
            'masuk' => $row[2],
            'pulang' => $row[3],
            'keterangan' => $row[4],
            'tanggal_import' => date('Y-m-d H:i:s'),
        ]);
    }

    public function startRow(): int
    {
        return 2; // Mulai import dari baris ke-2
    }
}
