<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;

class C_Dashboard extends Controller
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

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        if (Session()->get('role') === 'Admin') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'biodata'               => $this->ModelBiodataWeb->detail(1),
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
                'biodata'               => $this->ModelBiodataWeb->detail(1),
                'jumlahPengajuanCuti'   => $this->ModelPengajuanCuti->jumlahByUser($pegawai->id_pegawai),
                'selesaiPengajuanCuti'  => $this->ModelPengajuanCuti->jumlahByUserStatus($pegawai->id_pegawai, 'Selesai'),
            ];
            return view('pegawai.dashboard', $data);
        } elseif (Session()->get('role') === 'Wakil Direktur') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelBiodataWeb->detail(1),
            ];
            return view('wakildirektur.dashboard', $data);
        } elseif (Session()->get('role') === 'Ketua Jurusan') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelBiodataWeb->detail(1),
            ];
            return view('ketuajurusan.dashboard', $data);
        } elseif (Session()->get('role') === 'Bagian Umum') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelBiodataWeb->detail(1),
            ];
            return view('bagianumum.dashboard', $data);
        }
    }
}
