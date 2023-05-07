<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSurat extends Model
{
    use HasFactory;
    public $table = 'surat';

    public function getData()
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->orderBy('id_surat', 'ASC')->get();
    }

    public function detail($id_surat)
    {
        return DB::table($this->table)
            ->join('pegawai', 'pegawai.id_pegawai', '=', 'surat.id_pegawai', 'left')
            ->join('users', 'users.id_user', '=', 'pegawai.id_user', 'left')
            ->where('id_surat', $id_surat)->first();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_surat', $data['id_surat'])->update($data);
    }

    public function deleteData($id_surat)
    {
        DB::table($this->table)->where('id_surat', $id_surat)->delete();
    }
}
