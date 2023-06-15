<?php

namespace App\Http\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelArtikel;

class C_Landing extends Controller
{

    private $ModelSetting;
    private $ModelArtikel;

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelArtikel = new ModelArtikel();
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
            'title'         => 'The Future in Your Hands',
            'subTitle'      => 'Home',
            'biodata'       => $this->ModelSetting->detail(1),
            'dataArtikel'   => $this->ModelArtikel->getData()
        ];

        return view('landing.index', $data);
    }

    public function detailEdaran($id_artikel)
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
            'title'         => 'The Future in Your Hands',
            'subTitle'      => 'Detail Edaran',
            'biodata'       => $this->ModelSetting->detail(1),
            'detail'        => $this->ModelArtikel->detail($id_artikel)
        ];

        return view('landing.detailEdaran', $data);
    }
}
