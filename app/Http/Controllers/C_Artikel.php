<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelArtikel;

class C_Artikel extends Controller
{

    private $ModelUser;
    private $ModelSetting;
    private $ModelArtikel;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelArtikel = new ModelArtikel();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Artikel',
            'subTitle'      => 'Kelola Artikel',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataArtikel'   => $this->ModelArtikel->getData()
        ];

        return view('admin.artikel.data', $data);
    }

    public function detail($id_artikel)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Artikel',
            'subTitle'      => 'Detail Artikel',
            'biodata'       => $this->ModelSetting->detail(1),
            'detail'        => $this->ModelArtikel->detail($id_artikel),
            'user'          => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.artikel.detail', $data);
    }

    public function add()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Artikel',
            'subTitle'      => 'Tambah Artikel',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.artikel.add', $data);
    }

    public function addProcess()
    {
        Request()->validate([
            'judul'             => 'required',
            'deskripsi'         => 'required',
            'dokumen'           => 'required|mimes:pdf|max:2048',
            'gambar'            => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required'            => 'Judul artikel harus diisi!',
            'deskripsi.required'        => 'Deskripsi artikel harus diisi!',
            'dokumen.required'          => 'Dokumen harus diisi!',
            'dokumen.mimes'             => 'Format Dokumen harus pdf!',
            'dokumen.max'               => 'Ukuran Dokumen maksimal 2 mb',
            'gambar.required'           => 'Gambar artikel harus diisi!',
            'gambar.mimes'              => 'Format Gambar artikel harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran Gambar artikel maksimal 2 mb',
        ]);

        // Upload Dokumen
        $file1 = Request()->dokumen;
        $fileDokumen = date('mdYHis') . Request()->judul . '.' . $file1->extension();
        $file1->move(public_path('file_artikel'), $fileDokumen);

        // Upload Gambar Artikel
        $file2 = Request()->gambar;
        $fileGambar = date('mdYHis') . Request()->judul . '.' . $file2->extension();
        $file2->move(public_path('foto_artikel'), $fileGambar);

        $data = [
            'judul'             => Request()->judul,
            'deskripsi'         => Request()->deskripsi,
            'dokumen'           => $fileDokumen,
            'gambar'            => $fileGambar,
            'tanggal_upload'    => date('Y-m-d H:i:s')
        ];

        $this->ModelArtikel->add($data);
        return redirect()->route('kelola-artikel')->with('berhasil', 'Data artikel berhasil ditambahkan !');
    }

    public function edit($id_artikel)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Artikel',
            'subTitle'      => 'Edit Artikel',
            'biodata'       => $this->ModelSetting->detail(1),
            'detail'        => $this->ModelArtikel->detail($id_artikel),
            'user'          => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.artikel.edit', $data);
    }

    public function editProcess($id_artikel)
    {
        Request()->validate([
            'judul'             => 'required',
            'deskripsi'         => 'required',
            'status'            => 'required',
            'dokumen'           => 'mimes:pdf|max:2048',
            'gambar'            => 'mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul.required'            => 'Judul artikel harus diisi!',
            'deskripsi.required'        => 'Deskripsi artikel harus diisi!',
            'status.required'           => 'Status artikel harus diisi!',
            'dokumen.mimes'             => 'Format Dokumen harus pdf!',
            'dokumen.max'               => 'Ukuran Dokumen maksimal 2 mb',
            'gambar.mimes'              => 'Format Gambar artikel harus jpg/jpeg/png!',
            'gambar.max'                => 'Ukuran Gambar artikel maksimal 2 mb',
        ]);

        $detail = $this->ModelArtikel->detail($id_artikel);

        // Upload Dokumen
        if (Request()->dokumen) {
            if ($detail->dokumen <> "") {
                unlink(public_path('file_artikel') . '/' . $detail->dokumen);
            }

            $file1 = Request()->dokumen;
            $fileDokumen = date('mdYHis') . Request()->judul . '.' . $file1->extension();
            $file1->move(public_path('file_artikel'), $fileDokumen);
        }

        // Upload Gambar Artikel
        if (Request()->gambar) {
            if ($detail->gambar <> "") {
                unlink(public_path('foto_artikel') . '/' . $detail->gambar);
            }

            $file2 = Request()->gambar;
            $fileGambar = date('mdYHis') . Request()->judul . '.' . $file2->extension();
            $file2->move(public_path('foto_artikel'), $fileGambar);
        }

        if (Request()->dokumen && Request()->gambar) {
            $data = [
                'id_artikel'        => $id_artikel,
                'judul'             => Request()->judul,
                'status'            => Request()->status,
                'deskripsi'         => Request()->deskripsi,
                'dokumen'           => $fileDokumen,
                'gambar'            => $fileGambar
            ];
        } elseif (Request()->dokumen && !Request()->gambar) {
            $data = [
                'id_artikel'        => $id_artikel,
                'judul'             => Request()->judul,
                'status'            => Request()->status,
                'deskripsi'         => Request()->deskripsi,
                'dokumen'           => $fileDokumen,
            ];
        } elseif (Request()->gambar && !Request()->dokumen) {
            $data = [
                'id_artikel'        => $id_artikel,
                'judul'             => Request()->judul,
                'status'            => Request()->status,
                'deskripsi'         => Request()->deskripsi,
                'gambar'            => $fileGambar
            ];
        } else {
            $data = [
                'id_artikel'        => $id_artikel,
                'judul'             => Request()->judul,
                'status'            => Request()->status,
                'deskripsi'         => Request()->deskripsi
            ];
        }

        $this->ModelArtikel->edit($data);
        return redirect()->route('kelola-artikel')->with('berhasil', 'Data artikel berhasil diedit !');
    }

    public function deleteProcess($id_artikel)
    {
        $detail = $this->ModelArtikel->detail($id_artikel);

        if ($detail->dokumen <> "") {
            unlink(public_path('file_artikel') . '/' . $detail->dokumen);
        }

        if ($detail->gambar <> "") {
            unlink(public_path('foto_artikel') . '/' . $detail->gambar);
        }

        $this->ModelArtikel->deleteData($id_artikel);
        return redirect()->route('kelola-artikel')->with('berhasil', 'Data artikel berhasil dihapus !');
    }
}
