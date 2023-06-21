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
            'nip' => $row[1],
            'tanggal' => date('Y-m-d', ($row[2] - 25569) * 86400),
            'masuk' => $row[3],
            'pulang' => $row[4],
            'keterangan' => $row[5],
            'tanggal_import' => date('Y-m-d H:i:s'),
        ]);
    }

    public function startRow(): int
    {
        return 2; // Mulai import dari baris ke-2
    }
}
