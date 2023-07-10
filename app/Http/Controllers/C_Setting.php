<?php

namespace App\Http\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelUser;

class C_Setting extends Controller
{

    private $ModelSetting;
    private $ModelUser;
    private $public_path;

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelUser = new ModelUser();
        $this->public_path = 'foto_biodata';
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => '',
            'subTitle'  => 'Setting',
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'biodata'   => $this->ModelSetting->detail(1)
        ];

        return view('admin.setting.data', $data);
    }

    public function prosesEdit($id_setting)
    {
        Request()->validate([
            'nama_website'       => 'required',
            'email'              => 'required|email',
            'alamat'             => 'required',
            'nomor_telepon'      => 'required',
            'logo'               => 'mimes:jpeg,png,jpg,gif,svg',
        ], [
            'nama_website.required'   => 'Nama website harus diisi!',
            'email.required'          => 'Email harus diisi!',
            'email.email'             => 'Format email harus sesuai!',
            'alamat.required'         => 'Alamat harus diisi!',
            'nomor_telepon.required'  => 'Nomor telepon harus diisi!',
            'logo.mimes'              => 'Format logo harus jpg/jpeg/png/bmp!',
        ]);

        if (Request()->logo <> "") {
            $biodata = $this->ModelSetting->detail($id_setting);
            if ($biodata->logo <> "") {
                unlink(public_path($this->public_path) . '/' . $biodata->logo);
            }

            $file = Request()->logo;
            $fileName = date('mdYHis') . Request()->id_setting . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileName);

            $data = [
                'id_setting'        => $id_setting,
                'nama_website'      => Request()->nama_website,
                'email'             => Request()->email,
                'alamat'            => Request()->alamat,
                'nomor_telepon'     => Request()->nomor_telepon,
                'logo'              => $fileName,
            ];
        } else {
            $data = [
                'id_setting'        => $id_setting,
                'nama_website'      => Request()->nama_website,
                'email'             => Request()->email,
                'alamat'            => Request()->alamat,
                'nomor_telepon'     => Request()->nomor_telepon,
                // 'power_harga'       => Request()->power_harga,
            ];
        }

        $this->ModelSetting->edit($data);
        return redirect()->route('setting')->with('berhasil', 'Data Berhasil Diedit !');
    }
}
