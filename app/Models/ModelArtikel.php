<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelArtikel extends Model
{
    use HasFactory;
    public $table = 'artikel';

    public function getData()
    {
        return DB::table($this->table)
            ->orderBy('id_artikel', 'DESC')->get();
    }

    public function add($data)
    {
        DB::table($this->table)->insert($data);
    }

    public function edit($data)
    {
        DB::table($this->table)->where('id_artikel', $data['id_artikel'])->update($data);
    }

    public function deleteData($id_artikel)
    {
        DB::table($this->table)->where('id_artikel', $id_artikel)->delete();
    }
}
