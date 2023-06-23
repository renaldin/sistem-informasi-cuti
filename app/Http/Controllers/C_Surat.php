<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSurat;
use App\Models\ModelSetting;
use App\Models\ModelPegawai;
use PDF;

class C_Surat extends Controller
{

    private $ModelUser;
    private $ModelSurat;
    private $ModelSetting;
    private $ModelPegawai;

    public function __construct()
    {
        $this->ModelSurat = new ModelSurat();
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelPegawai = new ModelPegawai();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Surat',
            'subTitle'  => 'Kelola Surat',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'dataSurat' => $this->ModelSurat->getData(),
            'dataDetailSurat'   => $this->ModelSurat->getDataPegawai()
        ];

        return view('admin.surat.data', $data);
    }

    public function add()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Surat',
            'subTitle'  => 'Tambah Surat',
            'biodata'   => $this->ModelSetting->detail(1),
            'dataPegawai' => $this->ModelPegawai->getData(),
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.surat.add', $data);
    }

    public function addProcess()
    {
        Request()->validate([
            'id_pegawai'        => 'required',
            'no_surat'          => 'required',
            'tanggal'           => 'required',
            'tempat'            => 'required',
            'perihal_surat'     => 'required',
            'jenis_surat'       => 'required',
            'file_surat'        => 'required|mimes:pdf|max:5048',
        ], [
            'id_pegawai.required'       => 'Pegawai harus diisi!',
            'no_surat.required'         => 'No surat harus diisi!',
            'tanggal.required'         => 'Tanggal harus diisi!',
            'tempat.required'         => 'Tempat harus diisi!',
            'perihal_surat.required'     => 'Tujuan surat harus diisi!',
            'jenis_surat.required'      => 'Janis surat harus diisi!',
            'file_surat.required'       => 'File surat harus diisi!',
            'file_surat.mimes'          => 'Format File surat harus PDF!',
            'file_surat.max'            => 'Ukuran File surat maksimal 5 mb',
        ]);

        $file1 = Request()->file_surat;
        $fileSurat = date('mdYHis') . ' ' . Request()->no_surat . '.' . $file1->extension();
        $file1->move(public_path('file_surat'), $fileSurat);

        $data = [
            'no_surat'          => Request()->no_surat,
            'perihal_surat'      => Request()->perihal_surat,
            'hari'      => Request()->hari,
            'tanggal'      => Request()->tanggal,
            'tempat'      => Request()->tempat,
            'jenis_surat'       => Request()->jenis_surat,
            'tanggal_upload'    => Request()->tanggal_upload,
            'file_surat'        => $fileSurat,
            'tanggal_upload'    => date('Y-m-d'),
            'status_surat'      => 'Belum Dikirim',
        ];

        $this->ModelSurat->add($data);

        $lastData = $this->ModelSurat->lastData();

        foreach (Request()->id_pegawai as $item) {
            $dataDetailSurat = [
                'id_surat'  => $lastData->id_surat,
                'id_pegawai'    => $item
            ];
            $this->ModelSurat->addPegawai($dataDetailSurat);
        }

        return redirect()->route('kelola-surat')->with('berhasil', 'Data surat berhasil ditambahkan !');
    }

    public function edit($id_surat)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Surat',
            'subTitle'  => 'Edit Surat',
            'biodata'   => $this->ModelSetting->detail(1),
            'detail'    => $this->ModelSurat->detail($id_surat),
            'dataPegawai' => $this->ModelPegawai->getData(),
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.surat.edit', $data);
    }

    public function editProcess($id_surat)
    {
        Request()->validate([
            // 'id_pegawai'        => 'required',
            'no_surat'          => 'required',
            'tanggal'           => 'required',
            'tempat'            => 'required',
            'perihal_surat'      => 'required',
            'jenis_surat'       => 'required',
            'file_surat'        => 'mimes:pdf|max:5048',
        ], [
            // 'id_pegawai.required'       => 'Pegawai harus diisi!',
            'no_surat.required'         => 'No surat harus diisi!',
            'tanggal.required'         => 'Tanggal harus diisi!',
            'tempat.required'         => 'Tempat harus diisi!',
            'perihal_surat.required'     => 'Tujuan surat harus diisi!',
            'jenis_surat.required'      => 'Janis surat harus diisi!',
            'file_surat.mimes'          => 'Format File surat harus PDF!',
            'file_surat.max'            => 'Ukuran File surat maksimal 5 mb',
        ]);

        $surat = $this->ModelSurat->detail($id_surat);

        if (Request()->file_surat <> "") {
            if ($surat->file_surat <> "") {
                unlink(public_path('file_surat') . '/' . $surat->file_surat);
            }

            $file = Request()->file_surat;
            $fileSurat = date('mdYHis') . ' ' . Request()->no_surat . '.' . $file->extension();
            $file->move(public_path('file_surat'), $fileSurat);

            $data = [
                'id_surat'          => $id_surat,
                // 'id_pegawai'        => Request()->id_pegawai,
                'no_surat'          => Request()->no_surat,
                'perihal_surat'      => Request()->perihal_surat,
                'hari'      => Request()->hari,
                'tanggal'      => Request()->tanggal,
                'tempat'      => Request()->tempat,
                'jenis_surat'       => Request()->jenis_surat,
                'status_terlaksana'       => Request()->status_terlaksana,
                'file_surat'        => $fileSurat,
            ];
        } else {
            $data = [
                'id_surat'          => $id_surat,
                // 'id_pegawai'        => Request()->id_pegawai,
                'no_surat'          => Request()->no_surat,
                'perihal_surat'      => Request()->perihal_surat,
                'hari'      => Request()->hari,
                'tanggal'      => Request()->tanggal,
                'tempat'      => Request()->tempat,
                'jenis_surat'       => Request()->jenis_surat,
                'status_terlaksana'       => Request()->status_terlaksana,
            ];
        }

        $this->ModelSurat->edit($data);
        return redirect()->route('kelola-surat')->with('berhasil', 'Data surat berhasil diedit !');
    }

    public function detail($id_surat)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Surat',
            'subTitle'  => 'Detail Surat',
            'biodata'   => $this->ModelSetting->detail(1),
            'detail'    => $this->ModelSurat->detail($id_surat),
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.surat.detail', $data);
    }

    public function deleteProcess($id_surat)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $surat = $this->ModelSurat->detail($id_surat);

        if ($surat->file_surat <> "") {
            unlink(public_path('file_surat') . '/' . $surat->file_surat);
        }

        $this->ModelSurat->deletePegawai($id_surat);
        $this->ModelSurat->deleteData($id_surat);
        return redirect()->route('kelola-surat')->with('berhasil', 'Data surat berhasil dihapus !');
    }

    public function sendToPegawai($id_surat)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        // Kirim WA ATAU EMAIL

        $data = [
            'id_surat'          => $id_surat,
            'status_surat'      => 'Sudah Dikirim',
        ];

        $this->ModelSurat->edit($data);
        return redirect()->route('kelola-surat')->with('berhasil', 'Data surat berhasil dikirim ke pegawai !');
    }

    public function print()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Surat',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'dataSurat' => $this->ModelSurat->getDataByDate(Request()->tanggal_mulai, Request()->tanggal_akhir)
        ];

        $pdf = PDF::loadview('admin.cetak.cetak_surat', $data);
        return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
    }

    public function show()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'title'         => 'Data Surat',
            'subTitle'      => 'Lihat Surat',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataSurat'     => $this->ModelSurat->getDataPegawai()
        ];

        if ($user->role == 'Pegawai') {
            $route = 'pegawai.surat.data';
        } elseif ($user->role == 'Bagian Umum') {
            $route = 'bagianumum.surat.data';
        } elseif ($user->role == 'Wakil Direktur') {
            $route = 'wakildirektur.surat.data';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'ketuajurusan.surat.data';
        }

        return view($route, $data);
    }
}
