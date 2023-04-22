<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;

class Dashboard extends Controller
{

    private $ModelUser;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
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
            ];
            return view('admin.dashboard', $data);
        } elseif (Session()->get('role') === 'Pegawai') {
            $data = [
                'title'                 => null,
                'subTitle'              => 'Dashboard',
                'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
                'biodata'               => $this->ModelBiodataWeb->detail(1),
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
        }
    }
}
