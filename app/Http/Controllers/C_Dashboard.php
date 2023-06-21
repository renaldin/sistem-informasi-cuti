<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;
use App\Models\ModelSurat;

class C_Dashboard extends Controller
{

    private $ModelUser;
    private $ModelSetting;
    private $ModelPengajuanCuti;
    private $ModelPegawai;
    private $ModelSurat;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelPengajuanCuti = new ModelPengajuanCuti();
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelSurat = new ModelSurat();
    }

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        if (Session()->get('role') === 'Admin') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'biodata'               => $this->ModelSetting->detail(1),
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'jumlahUser'            => $this->ModelUser->jumlahUser(),
                'jumlahPegawai'         => $this->ModelPegawai->jumlahPegawai(),
                'jumlahPengajuanCuti'   => $this->ModelPengajuanCuti->jumlahPengajuanCuti(),
                'selesaiPengajuanCuti'  => $this->ModelPengajuanCuti->jumlahByStatus('Selesai'),
            ];

            return view('admin.dashboard', $data);
        } elseif (Session()->get('role') === 'Pegawai') {

            $pegawai = $this->ModelPegawai->detailByIdUser(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelSetting->detail(1),
                'dataSurat'             => $this->ModelSurat->getDataPegawai(),
                'jumlahPengajuanCuti'   => $this->ModelPengajuanCuti->jumlahByUser($pegawai->id_pegawai),
                'selesaiPengajuanCuti'  => $this->ModelPengajuanCuti->jumlahByUserStatus($pegawai->id_pegawai, 'Selesai'),
            ];
            return view('pegawai.dashboard', $data);
        } elseif (Session()->get('role') === 'Wakil Direktur') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'dataSurat'             => $this->ModelSurat->getDataPegawai(),
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelSetting->detail(1),
            ];
            return view('wakildirektur.dashboard', $data);
        } elseif (Session()->get('role') === 'Ketua Jurusan') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'dataSurat'             => $this->ModelSurat->getDataPegawai(),
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelSetting->detail(1),
            ];
            return view('ketuajurusan.dashboard', $data);
        } elseif (Session()->get('role') === 'Bagian Umum') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelSetting->detail(1),
            ];
            return view('bagianumum.dashboard', $data);
        }
    }
}
