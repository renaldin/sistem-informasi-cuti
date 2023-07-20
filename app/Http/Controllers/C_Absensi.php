<?php

namespace App\Http\Controllers;

use App\Imports\AbsensiImport;
use App\Models\ModelUser;
use App\Models\ModelPegawai;
use App\Models\ModelSetting;
use App\Models\ModelAbsensi;
use Illuminate\Support\Facades\Hash;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
use GuzzleHttp\Psr7\Request;

class C_Absensi extends Controller
{

    private $ModelUser;
    private $ModelSetting;
    private $ModelPegawai;
    private $ModelAbsensi;
    private $public_path;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelAbsensi = new ModelAbsensi();
        $this->ModelPegawai = new ModelPegawai();
        $this->public_path = 'file_absensi';
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Absensi',
            'subTitle'      => 'Kelola Absensi',
            'biodata'       => $this->ModelSetting->detail(1),
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

        $ekstensi = $file->extension();

        if ($ekstensi === 'xls' || $ekstensi === 'xlsx') {
            Excel::import(new AbsensiImport, $file);

            return redirect()->back()->with('berhasil', 'Data absensi berhasil diimport !');
        } else {
            return redirect()->back()->with('gagal', 'File yang di import bukan file Excel, harusnya file Excel !');
        }
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
            'tanggal'       => Request()->tanggal,
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
            'subTitle'      => 'Riwayat Absensi',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataAbsensi'   => $this->ModelAbsensi->getData()
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

    public function filter()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if (Request()->filter == 'Tanggal') {
            $dataAbsensi = $this->ModelAbsensi->getDataByDate(Request()->tanggal_mulai, Request()->tanggal_akhir);
        } elseif (Request()->filter == 'Bulan') {
            $dataAbsensi = $this->ModelAbsensi->getDataByMonth(Request()->bulan, Request()->tahun);
        }

        $data = [
            'title'         => 'Data Absensi',
            'subTitle'      => 'Riwayat Absensi',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataAbsensi'   => $dataAbsensi
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
    //         'subTitle'      => 'Riwayat Absensi',
    //         'biodata'       => $this->ModelSetting->detail(1),
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

    public function editAlasan($id_absensi)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelAbsensi->detail($id_absensi);

        if (Request()->file_absensi) {
            if ($detail->file_absensi <> "") {
                unlink(public_path($this->public_path) . '/' . $detail->file_absensi);
            }

            $file2 = Request()->file_absensi;
            $fileAbsensi = date('mdYHis') . $detail->nama . '.' . $file2->extension();
            $file2->move(public_path($this->public_path), $fileAbsensi);

            $file_absensi = $fileAbsensi;
        } else {
            if ($detail->file_absensi !== null) {
                $file_absensi = $detail->file_absensi;
            } else {
                $file_absensi = null;
            }
        }

        $data = [
            'id_absensi'    => $id_absensi,
            'alasan'        => Request()->alasan,
            'file_absensi'          => $file_absensi
        ];

        $this->ModelAbsensi->edit($data);
        return redirect()->back()->with('berhasil', 'Data absensi berhasil diedit !');
    }
}
