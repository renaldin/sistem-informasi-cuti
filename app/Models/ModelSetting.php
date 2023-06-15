<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSetting extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('setting')->orderBy('id_setting', 'DESC')->get();
    }

    public function detail($id_setting)
    {
        return DB::table('setting')->where('id_setting', $id_setting)->first();
    }

    public function edit($data)
    {
        DB::table('setting')->where('id_setting', $data['id_setting'])->update($data);
    }
}
