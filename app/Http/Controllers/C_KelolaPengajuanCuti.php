<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;
use PDF;

class C_KelolaPengajuanCuti extends Controller
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

    // admin
    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Pengajuan Cuti',
            'subTitle'          => 'Kelola Pengajuan Cuti',
            'biodata'           => $this->ModelSetting->detail(1),
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

        if (Session()->get('role') === 'Admin') {
            $page = 'admin.pengajuancuti.detail';
            $title = 'Pengajuan Cuti';
        } elseif (Session()->get('role') === 'Ketua Jurusan') {
            $page = 'ketuajurusan.perizinancuti.detail';
            $title = 'Perizinan Cuti';
        } elseif (Session()->get('role') === 'Wakil Direktur') {
            $page = 'wakildirektur.perizinancuti.detail';
            $title = 'Perizinan Cuti';
        }

        $data = [
            'title'     => $title,
            'subTitle'  => 'Detail Pengajuan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view($page, $data);
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

    public function sendToKetuaJurusan($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Dikirim ke Ketua Jurusan',
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
            'biodata'   => $this->ModelSetting->detail(1),
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
            'biodata'           => $this->ModelSetting->detail(1),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataNotByOneStatus('Persiapan')
        ];

        $pdf = PDF::loadview('admin/cetak/cetak_all_pengajuan_cuti', $data);
        return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
    }
    // tutup admin

    // ketua jurusan
    public function dataCutiKetuaJurusan()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Perizinan Cuti',
            'subTitle'          => 'Data Perizinan Cuti',
            'biodata'           => $this->ModelSetting->detail(1),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataByTwoStatus('Dikirim ke Ketua Jurusan', 'Diterima Ketua Jurusan')
        ];

        return view('ketuajurusan.perizinancuti.data', $data);
    }

    public function acceptKetuaJurusan($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Diterima Ketua Jurusan',
        ];

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('perizinan-cuti-ketua-jurusan')->with('berhasil', 'Data pengajuan cuti berhasil diterima !');
    }

    public function permissionKetuaJurusan($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Perizinan Cuti',
            'subTitle'  => 'Form Perizinan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('ketuajurusan.perizinancuti.permission', $data);
    }

    public function permissionKetuaJurusanProcess($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));
        $cuti = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);

        if ($cuti->role == 'Pegawai') {
            $pertimbangan_ketua_jurusan = Request()->pertimbangan_ketua_jurusan;
            if ($pertimbangan_ketua_jurusan !== 'DISETUJUI') {
                $status_pengajuan = 'Selesai';
            } else {
                $status_pengajuan = 'Dikirim ke Wakil Direktur';
            }

            $data = [
                'id_pengajuan_cuti'         => $id_pengajuan_cuti,
                'ketua_jurusan'                    => $user->nama,
                'nip_ketua_jurusan'                => $user->nip,
                'pertimbangan_ketua_jurusan'       => Request()->pertimbangan_ketua_jurusan,
                'alasan_pertimbangan_ketua_jurusan' => Request()->alasan_pertimbangan_ketua_jurusan,
                'tanda_tangan_kajur'   => $user->tanda_tangan,
                'status_pengajuan'          => $status_pengajuan,
            ];

            $route = 'perizinan-cuti-ketua-jurusan';
        } elseif ($cuti->role == 'Ketua Jurusan') {
            $data = [
                'id_pengajuan_cuti'                 => $id_pengajuan_cuti,
                'ketua_jurusan'                     => $cuti->nama,
                'nip_ketua_jurusan'                 => $cuti->nip,
                'pertimbangan_ketua_jurusan'        => 'DISETUJUI',
                'status_pengajuan'                  => 'Dikirim ke Wakil Direktur'
            ];

            $route = 'kelola-pengajuan-cuti';
        }

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil diberi izin !');
    }
    // tutup ketua jurusan

    // wakil direktur
    public function dataCutiWakilDirektur()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Perizinan Cuti',
            'subTitle'          => 'Data Perizinan Cuti',
            'biodata'           => $this->ModelSetting->detail(1),
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPengajuanCuti' => $this->ModelPengajuanCuti->getDataByTwoStatus('Dikirim ke Wakil Direktur', 'Diterima Wakil Direktur')
        ];

        return view('wakildirektur.perizinancuti.data', $data);
    }

    public function acceptWakilDirektur($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Diterima Wakil Direktur',
        ];

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('perizinan-cuti-wakil-direktur')->with('berhasil', 'Data pengajuan cuti berhasil diterima !');
    }

    public function permissionWakilDirektur($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Perizinan Cuti',
            'subTitle'  => 'Form Perizinan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('wakildirektur.perizinancuti.permission', $data);
    }

    public function permissionWakilDirekturProcess($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'id_pengajuan_cuti'                => $id_pengajuan_cuti,
            'wakil_direktur'                   => $user->nama,
            'nip_wakil_direktur'               => $user->nip,
            'keputusan_wakil_direktur'         => Request()->keputusan_wakil_direktur,
            'alasan_keputusan_wakil_direktur'  => Request()->alasan_keputusan_wakil_direktur,
            'tanda_tangan_wadir'   => $user->tanda_tangan,
            'status_pengajuan'                 => 'Selesai',
        ];

        $this->ModelPengajuanCuti->edit($data);
        return redirect()->route('perizinan-cuti-wakil-direktur')->with('berhasil', 'Data pengajuan cuti berhasil diberi izin !');
    }
    // tutup wakil direktur
}
