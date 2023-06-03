<?php

namespace App\Http\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;

class C_Landing extends Controller
{

    private $ModelAuth;
    private $ModelBiodataWeb;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (Session()->get('email')) {
            if (Session()->get('role') === 'Admin') {
                return redirect()->route('dashboardAdmin');
            } elseif (Session()->get('role') === 'Pegawai') {
                return redirect()->route('dashboardPegawai');
            } elseif (Session()->get('role') === 'Ketua Jurusan') {
                return redirect()->route('dashboardKetuaJurusan');
            } elseif (Session()->get('role') === 'Wakil Direktur') {
                return redirect()->route('dashboardWakilDirektur');
            } elseif (Session()->get('role') === 'Bagian Umum') {
                return redirect()->route('dashboardBagianUmum');
            }
        }

        $data = [
            'title' => 'The Future in Your Hands',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('landing.index', $data);
    }
}
