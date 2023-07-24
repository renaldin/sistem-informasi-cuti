<?php

namespace App\Exports;

use App\Models\ModelAbsensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return ModelAbsensi::select('nama', 'nip', 'tanggal', 'masuk', 'pulang', 'keterangan')->whereBetween('tanggal', [$this->startDate, $this->endDate])->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIP/NIK',
            'Tanggal',
            'Masuk',
            'Pulang',
            'Katerangan',
            // Tambahkan kolom lain sesuai dengan struktur tabel
        ];
    }
}
