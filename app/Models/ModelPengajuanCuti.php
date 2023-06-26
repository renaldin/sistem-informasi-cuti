<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPengajuanCuti extends Model
{
    use HasFactory;
    public $table = 'pengajuan_cuti';

    public function getData()
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->orderBy('id_pengajuan_cuti', 'DESC')->get();
    }

    public function getDataByUser($id_pegawai)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('pengajuan_cuti.id_pegawai', $id_pegawai)
            ->orderBy('id_pengajuan_cuti', 'DESC')->get();
    }

    public function getDataByUserStatus($id_pegawai, $status)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('pengajuan_cuti.id_pegawai', $id_pegawai)
            ->where('pengajuan_cuti.status_pengajuan', $status)
            ->orderBy('id_pengajuan_cuti', 'DESC')->get();
    }

    public function getDataNotByOneStatus($status)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->whereNotIn('status_pengajuan', [$status])
            ->orderBy('id_pengajuan_cuti', 'DESC')->get();
    }

    public function getDataByTwoStatus($status1, $status2)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('status_pengajuan', $status1)
            ->orWhere('status_pengajuan', $status2)
            ->orderBy('id_pengajuan_cuti', 'DESC')->get();
    }

    public function detail($id_pengajuan_cuti)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'pengajuan_cuti.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('id_pengajuan_cuti', $id_pengajuan_cuti)->first();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_pengajuan_cuti', $data['id_pengajuan_cuti'])->update($data);
    }

    public function deleteData($id_pengajuan_cuti)
    {
        DB::table($this->table)->where('id_pengajuan_cuti', $id_pengajuan_cuti)->delete();
    }

    public function jumlahPengajuanCuti()
    {
        return DB::table($this->table)->count();
    }

    public function jumlahByStatus($status)
    {
        return DB::table($this->table)->where('status_pengajuan', $status)->count();
    }

    public function jumlahByUser($id_pegawai)
    {
        return DB::table($this->table)->where('id_pegawai', $id_pegawai)->count();
    }

    public function jumlahByUserStatus($id_pegawai, $status)
    {
        return DB::table($this->table)->where('id_pegawai', $id_pegawai)->where('status_pengajuan', $status)->count();
    }
}
