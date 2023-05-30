<?php

namespace App\Http\Controllers;

use App\Imports\AbsensiImport;
use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use App\Models\ModelAbsensi;
use Illuminate\Support\Facades\Hash;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;

class C_Absensi extends Controller
{

    private $ModelUser;
    private $ModelBiodataWeb;
    private $ModelPegawai;
    private $ModelAbsensi;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelAbsensi = new ModelAbsensi();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Absensi',
            'subTitle'      => 'Kelola Absensi',
            'biodata'       => $this->ModelBiodataWeb->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataAbsensi'   => $this->ModelAbsensi->getData()
        ];

        return view('admin.absensi.data', $data);
    }

    public function import()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $file = Request()->file('file');

        Excel::import(new AbsensiImport, $file);

        return redirect()->back()->with('berhasil', 'Data absensi berhasil diimport !');
    }

    public function addProcess()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'nama'          => Request()->nama,
            'tanggal'       => date('d/m/Y', strtotime(Request()->tanggal)),
            'masuk'         => date('d-M-y H:i:s', strtotime(Request()->masuk)),
            'pulang'        => date('d-M-y H:i:s', strtotime(Request()->pulang)),
            'keterangan'    => Request()->keterangan,
            'tanggal_import' => date('Y-m-d H:i:s')
        ];

        $this->ModelAbsensi->add($data);
        return redirect()->back()->with('berhasil', 'Data absensi berhasil ditambah !');
    }

    public function editProcess($id_absensi)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'id_absensi'    => $id_absensi,
            'nama'          => Request()->nama,
            'tanggal'       => date('d/m/Y', strtotime(Request()->tanggal)),
            'masuk'         => date('d-M-y H:i:s', strtotime(Request()->masuk)),
            'pulang'        => date('d-M-y H:i:s', strtotime(Request()->pulang)),
            'keterangan'    => Request()->keterangan,
            'tanggal_import' => date('Y-m-d H:i:s')
        ];

        $this->ModelAbsensi->edit($data);
        return redirect()->back()->with('berhasil', 'Data absensi berhasil diedit !');
    }
}
