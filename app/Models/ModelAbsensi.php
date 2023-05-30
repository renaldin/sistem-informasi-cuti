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

    public function getData()
    {
        return DB::table($this->table)
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
}
