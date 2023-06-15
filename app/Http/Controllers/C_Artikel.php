<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelArtikel;

class C_Absensi extends Controller
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
}
