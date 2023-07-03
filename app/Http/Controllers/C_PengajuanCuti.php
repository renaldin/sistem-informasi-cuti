<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;

class C_PengajuanCuti extends Controller
{

    private $ModelUser;
    private $ModelSetting;
    private $ModelPengajuanCuti;
    private $ModelPegawai;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelPengajuanCuti = new ModelPengajuanCuti();
        $this->ModelPegawai = new ModelPegawai();
    }

    // pegawai
    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $pegawai = $this->ModelPegawai->detailByIdUser(Session()->get('id_user'));

        $data = [
            'title'             => 'Pengajuan Cuti',
            'subTitle'          => 'Data Pengajuan Cuti',
            'biodata'           => $this->ModelSetting->detail(1),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataByUser($pegawai->id_pegawai)
        ];

        return view('pegawai.pengajuancuti.data', $data);
    }

    public function add()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Tambah Pengajuan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'pegawai'   => $this->ModelPegawai->detailByIdUser(Session()->get('id_user')),
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('pegawai.pengajuancuti.add', $data);
    }

    public function addProcess()
    {
        Request()->validate([
            'jenis_cuti'            => 'required',
            'alasan_cuti'           => 'required',
            'lama_cuti'             => 'required|numeric',
            'jenis_waktu'           => 'required',
            'mulai_tanggal'         => 'required',
            'akhir_tanggal'         => 'required',
            'alamat_selama_cuti'    => 'required',

        ], [
            'jenis_cuti.required'           => 'Jenis cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'lama_cuti.required'            => 'Lama cuti harus diisi!',
            'lama_cuti.numeric'             => 'Lama cuti harus angka!',
            'jenis_waktu.required'          => 'Jenis waktu harus diisi!',
            'mulai_tanggal.required'        => 'Tanggal mulai harus diisi!',
            'akhir_tanggal.required'        => 'Tanggal akhir harus diisi!',
            'alamat_selama_cuti.required'   => 'Alamat selama cuti harus diisi!',

        ]);

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'id_pegawai'        => Request()->id_pegawai,
            'jenis_cuti'        => Request()->jenis_cuti,
            'alasan_cuti'       => Request()->alasan_cuti,
            'lama_cuti'         => Request()->lama_cuti,
            'jenis_waktu'       => Request()->jenis_waktu,
            'mulai_tanggal'     => Request()->mulai_tanggal,
            'akhir_tanggal'     => Request()->akhir_tanggal,
            'alamat_selama_cuti' => Request()->alamat_selama_cuti,
            'status_pengajuan'  => 'Persiapan',
            'tanggal_pengajuan' => date('Y-m-d'),
        ];

        if ($user->role == 'Pegawai') {
            $route = 'pengajuan-cuti';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'pengajuan-cuti-ketua-jurusan';
        }

        $this->ModelPengajuanCuti->add($data);
        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil ditambahkan !');
    }

    public function detail($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Detail Pengajuan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('pegawai.pengajuancuti.detail', $data);
    }

    public function edit($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Edit Pengajuan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('pegawai.pengajuancuti.edit', $data);
    }

    public function editProcess($id_pengajuan_cuti)
    {
        Request()->validate([
            'jenis_cuti'            => 'required',
            'alasan_cuti'           => 'required',
            'lama_cuti'             => 'required|numeric',
            'jenis_waktu'           => 'required',
            'mulai_tanggal'         => 'required',
            'akhir_tanggal'         => 'required',
            'alamat_selama_cuti'    => 'required',

        ], [
            'jenis_cuti.required'           => 'Jenis cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'lama_cuti.required'            => 'Lama cuti harus diisi!',
            'lama_cuti.numeric'             => 'Lama cuti harus angka!',
            'jenis_waktu.required'          => 'Jenis waktu harus diisi!',
            'mulai_tanggal.required'        => 'Tanggal mulai harus diisi!',
            'akhir_tanggal.required'        => 'Tanggal akhir harus diisi!',
            'alamat_selama_cuti.required'   => 'Alamat selama cuti harus diisi!',

        ]);

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'id_pegawai'        => Request()->id_pegawai,
            'jenis_cuti'        => Request()->jenis_cuti,
            'alasan_cuti'       => Request()->alasan_cuti,
            'lama_cuti'         => Request()->lama_cuti,
            'jenis_waktu'       => Request()->jenis_waktu,
            'mulai_tanggal'     => Request()->mulai_tanggal,
            'akhir_tanggal'     => Request()->akhir_tanggal,
            'alamat_selama_cuti' => Request()->alamat_selama_cuti,
        ];

        if ($user->role == 'Pegawai') {
            $route = 'pengajuan-cuti';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'pengajuan-cuti-ketua-jurusan';
        }

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil diedit !');
    }

    public function sendToAdmin($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Dikirim ke Admin',
            'tanda_tangan_pegawai'   => $user->tanda_tangan,
        ];


        if ($user->role == 'Pegawai') {
            $route = 'pengajuan-cuti';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'pengajuan-cuti-ketua-jurusan';
        }

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil dikirim !');
    }

    public function deleteProcess($id_pengajuan_cuti)
    {
        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if ($user->role == 'Pegawai') {
            $route = 'pengajuan-cuti';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'pengajuan-cuti-ketua-jurusan';
        }

        $this->ModelPengajuanCuti->deleteData($id_pengajuan_cuti);
        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil dihapus !');
    }

    public function history()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $pegawai = $this->ModelPegawai->detailByIdUser(Session()->get('id_user'));

        $data = [
            'title'             => 'Riwayat Pengajuan Cuti',
            'subTitle'          => 'Riwayat Pengajuan Cuti',
            'biodata'           => $this->ModelSetting->detail(1),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataByUserStatus($pegawai->id_pegawai, 'Selesai')
        ];

        return view('pegawai.pengajuancuti.history', $data);
    }
    // tutup pegawai
}
