<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPegawai extends Model
{
    use HasFactory;
    public $table = 'pegawai';

    public function getData()
    {
        return DB::table($this->table)
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->orderBy('id_pegawai', 'DESC')->get();
    }

    public function detail($id_pegawai)
    {
        return DB::table($this->table)->where('id_pegawai', $id_pegawai)->first();
    }

    public function detailByIdUser($id_user)
    {
        return DB::table($this->table)
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('pegawai.id_user', $id_user)
            ->first();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_pegawai', $data['id_pegawai'])->update($data);
    }

    public function deleteData($id_pegawai)
    {
        DB::table($this->table)->where('id_pegawai', $id_pegawai)->delete();
    }

    public function jumlahPegawai()
    {
        return DB::table($this->table)->count();
    }
}
