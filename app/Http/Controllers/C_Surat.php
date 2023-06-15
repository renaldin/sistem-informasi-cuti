<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\ModelUser;
use App\Models\ModelSurat;
use App\Models\ModelSetting;
use App\Models\ModelPegawai;

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
            'dataSurat' => $this->ModelSurat->getData()
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
            'tujuan_surat'      => 'required',
            'jenis_surat'       => 'required',
            'file_surat'        => 'required|mimes:pdf|max:5048',
        ], [
            'id_pegawai.required'       => 'Pegawai harus diisi!',
            'no_surat.required'         => 'No surat harus diisi!',
            'tujuan_surat.required'     => 'Tujuan surat harus diisi!',
            'jenis_surat.required'      => 'Janis surat harus diisi!',
            'file_surat.required'       => 'File surat harus diisi!',
            'file_surat.mimes'          => 'Format File surat harus PDF!',
            'file_surat.max'            => 'Ukuran File surat maksimal 5 mb',
        ]);

        $file1 = Request()->file_surat;
        $fileSurat = date('mdYHis') . ' ' . Request()->no_surat . '.' . $file1->extension();
        $file1->move(public_path('file_surat'), $fileSurat);

        $data = [
            'id_pegawai'        => Request()->id_pegawai,
            'no_surat'          => Request()->no_surat,
            'tujuan_surat'      => Request()->tujuan_surat,
            'jenis_surat'       => Request()->jenis_surat,
            'tanggal_upload'    => Request()->tanggal_upload,
            'file_surat'        => $fileSurat,
            'tanggal_upload'    => date('Y-m-d'),
            'status_surat'      => 'Belum Dikirim',
        ];

        $this->ModelSurat->add($data);
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
            'id_pegawai'        => 'required',
            'no_surat'          => 'required',
            'tujuan_surat'      => 'required',
            'jenis_surat'       => 'required',
            'file_surat'        => 'mimes:pdf|max:5048',
        ], [
            'id_pegawai.required'       => 'Pegawai harus diisi!',
            'no_surat.required'         => 'No surat harus diisi!',
            'tujuan_surat.required'     => 'Tujuan surat harus diisi!',
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
                'id_pegawai'        => Request()->id_pegawai,
                'no_surat'          => Request()->no_surat,
                'tujuan_surat'      => Request()->tujuan_surat,
                'jenis_surat'       => Request()->jenis_surat,
                'file_surat'        => $fileSurat,
            ];
        } else {
            $data = [
                'id_surat'          => $id_surat,
                'id_pegawai'        => Request()->id_pegawai,
                'no_surat'          => Request()->no_surat,
                'tujuan_surat'      => Request()->tujuan_surat,
                'jenis_surat'       => Request()->jenis_surat,
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
}
