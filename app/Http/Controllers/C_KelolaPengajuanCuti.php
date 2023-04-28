<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;
use PDF;

class C_KelolaPengajuanCuti extends Controller
{

    private $ModelUser;
    private $ModelBiodataWeb;
    private $ModelPengajuanCuti;
    private $ModelPegawai;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelPengajuanCuti = new ModelPengajuanCuti();
        $this->ModelPegawai = new ModelPegawai();
    }

    // admin
    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Pengajuan Cuti',
            'subTitle'          => 'Kelola Pengajuan Cuti',
            'biodata'           => $this->ModelBiodataWeb->detail(1),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataNotByOneStatus('Persiapan')
        ];

        return view('admin.pengajuancuti.data', $data);
    }

    public function detail($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Detail Pengajuan Cuti',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('admin.pengajuancuti.detail', $data);
    }

    public function edit($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Edit Pengajuan Cuti',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('admin.pengajuancuti.edit', $data);
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

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('kelola-pengajuan-cuti')->with('berhasil', 'Data pengajuan cuti berhasil diedit !');
    }

    public function deleteProcess($id_pengajuan_cuti)
    {
        $this->ModelPengajuanCuti->deleteData($id_pengajuan_cuti);
        return redirect()->route('kelola-pengajuan-cuti')->with('berhasil', 'Data pengajuan cuti berhasil dihapus !');
    }

    public function sendToAtasan($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Dikirim ke Atasan',
        ];

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('kelola-pengajuan-cuti')->with('berhasil', 'Data pengajuan cuti berhasil dikirim !');
    }

    public function accept($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        if (Session()->get('role') === 'Admin') {
            $status = 'Diterima Admin';
        }

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => $status,
        ];

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('kelola-pengajuan-cuti')->with('berhasil', 'Data pengajuan cuti berhasil diterima !');
    }

    public function downloadProcess($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);

        $data = [
            'title'     => 'Pengajuan Cuti ' . $detail->nama,
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'detail'    => $detail
        ];

        $pdf = PDF::loadview('admin/cetak/cetak_pengajuan_cuti', $data);
        return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
    }

    public function downloadAllProcess()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Data Pengajuan Cuti',
            'biodata'           => $this->ModelBiodataWeb->detail(1),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataNotByOneStatus('Persiapan')
        ];

        $pdf = PDF::loadview('admin/cetak/cetak_all_pengajuan_cuti', $data);
        return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
    }
    // tutup admin
}
