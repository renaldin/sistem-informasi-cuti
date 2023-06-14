<?php

namespace App\Http\Controllers;

use App\Imports\AbsensiImport;
use App\Models\ModelUser;
use App\Models\ModelPegawai;
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
        $this->ModelPegawai = new ModelPegawai();
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
            'dataPegawai'   => $this->ModelPegawai->getData(),
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

        $pegawai = $this->ModelPegawai->detail(Request()->id_pegawai);

        $data = [
            'nama'          => $pegawai->nama,
            'nip'           => $pegawai->nip,
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
            'nip'           => Request()->nip,
            'tanggal'       => date('d/m/Y', strtotime(Request()->tanggal)),
            'masuk'         => date('d-M-y H:i:s', strtotime(Request()->masuk)),
            'pulang'        => date('d-M-y H:i:s', strtotime(Request()->pulang)),
            'keterangan'    => Request()->keterangan,
            'tanggal_import' => date('Y-m-d H:i:s')
        ];

        $this->ModelAbsensi->edit($data);
        return redirect()->back()->with('berhasil', 'Data absensi berhasil diedit !');
    }

    public function show()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'title'         => 'Data Absensi',
            'subTitle'      => 'Lihat Absensi',
            'biodata'       => $this->ModelBiodataWeb->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataAbsensi'   => $this->ModelAbsensi->getDataByNip($user->nip)
        ];

        if ($user->role == 'Pegawai') {
            $route = 'pegawai.absensi.data';
        } elseif ($user->role == 'Bagian Umum') {
            $route = 'bagianumum.absensi.data';
        } elseif ($user->role == 'Wakil Direktur') {
            $route = 'wakildirektur.absensi.data';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'ketuajurusan.absensi.data';
        }

        return view($route, $data);
    }

    // public function absensiByDate()
    // {
    //     if (!Session()->get('email')) {
    //         return redirect()->route('login');
    //     }

    //     $tanggalMulai = date('d/m/Y', strtotime(Request()->tanggal_mulai));
    //     $tanggalAkhir = date('d/m/Y', strtotime(Request()->tanggal_akhir));

    //     $user = $this->ModelUser->detail(Session()->get('id_user'));

    //     $data = [
    //         'title'         => 'Data Absensi',
    //         'subTitle'      => 'Lihat Absensi',
    //         'biodata'       => $this->ModelBiodataWeb->detail(1),
    //         'user'          => $this->ModelUser->detail(Session()->get('id_user')),
    //         'dataAbsensi'   => $this->ModelAbsensi->getDataByDate($tanggalMulai, $tanggalAkhir)
    //     ];
    //     dd($data);

    //     if ($user->role == 'Pegawai') {
    //         $route = 'pegawai.absensi.data';
    //     } elseif ($user->role == 'Bagian Umum') {
    //         $route = 'bagianumum.absensi.data';
    //     } elseif ($user->role == 'Wakil Direktur') {
    //         $route = 'wakildirektur.absensi.data';
    //     } elseif ($user->role == 'Ketua Jurusan') {
    //         $route = 'ketuajurusan.absensi.data';
    //     }

    //     return view($route, $data);
    // }
}
