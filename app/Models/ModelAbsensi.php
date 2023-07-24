<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAbsensi extends Model
{
    use HasFactory;
    protected $guarded = ['id_absensi'];
    public $table = 'absensi';
    protected $fillable = ['nama', 'nip', 'tanggal', 'masuk', 'pulang', 'keterangan'];

    public function getData()
    {
        return DB::table($this->table)
            ->orderBy('id_absensi', 'DESC')->get();
    }

    public function getDataByNip($nip)
    {
        return DB::table($this->table)
            ->where('nip', $nip)
            ->orderBy('id_absensi', 'DESC')->get();
    }

    public function getDataByMonth($bulan, $tahun)
    {
        return DB::table($this->table)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('id_absensi', 'DESC')->get();
    }

    public function getDataByDate($tanggal_mulai, $tanggal_akhir)
    {
        return DB::table($this->table)
            ->whereBetween('tanggal', [$tanggal_mulai, $tanggal_akhir])
            ->orderBy('id_absensi', 'DESC')->get();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_absensi', $data['id_absensi'])->update($data);
    }

    public function detail($id_absensi)
    {
        return DB::table($this->table)
            ->where('id_absensi', $id_absensi)
            ->first();
    }
}
