<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelPengajuanCuti;
use App\Models\ModelPegawai;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        date_default_timezone_set('Asia/Jakarta');
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
            'jenis_waktu'           => 'required',
            'alamat_selama_cuti'    => 'required',

        ], [
            'jenis_cuti.required'           => 'Jenis cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'jenis_waktu.required'          => 'Jenis waktu harus diisi!',
            'alamat_selama_cuti.required'   => 'Alamat selama cuti harus diisi!',

        ]);

        $jumlah_cuti = array_sum(Request()->lama_cuti);

        $lama_cuti = "";
        foreach (Request()->lama_cuti as $item) {
            $lama_cuti = $lama_cuti . "|" . $item;
        }
        $mulai_tanggal = "";
        foreach (Request()->mulai_tanggal as $item) {
            $mulai_tanggal = $mulai_tanggal . "|" . $item;
        }
        $akhir_tanggal = "";
        foreach (Request()->akhir_tanggal as $item) {
            $akhir_tanggal = $akhir_tanggal . "|" . $item;
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));
        $detailPegawai = $this->ModelPegawai->detail(Request()->id_pegawai);

        if (Request()->jenis_cuti === 'Cuti Tahunan') {
            $tahun_cuti = Request()->tahun_cuti;
            if (Request()->tahun_cuti === '(N-2) 2 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n_2'        => $detailPegawai->cuti_n_2 - $jumlah_cuti,
                ];
            } elseif (Request()->tahun_cuti === '(N-1) 1 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n_1'        => $detailPegawai->cuti_n_1 - $jumlah_cuti,
                ];
            } elseif (Request()->tahun_cuti === '(N) Tahun Berjalan') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n'        => $detailPegawai->cuti_n - $jumlah_cuti,
                ];
            }
        } else {
            $tahun_cuti = null;

            if (Request()->jenis_cuti === 'Cuti Besar') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_besar'        => $detailPegawai->cuti_besar + $jumlah_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Sakit') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_sakit'        => $detailPegawai->cuti_sakit + $jumlah_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Melahirkan') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_melahirkan'        => $detailPegawai->cuti_melahirkan + $jumlah_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Karena Alasan Penting') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_karena_alasan_penting'        => $detailPegawai->cuti_karena_alasan_penting + $jumlah_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti di Luar Tanggungan Negara') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_diluar_tanggungan_negara'        => $detailPegawai->cuti_diluar_tanggungan_negara + $jumlah_cuti,
                ];
            }
        }
        $this->ModelPegawai->edit($pegawai);

        $data = [
            'id_pegawai'        => Request()->id_pegawai,
            'jenis_cuti'        => Request()->jenis_cuti,
            'tahun_cuti'        => $tahun_cuti,
            'alasan_cuti'       => Request()->alasan_cuti,
            'lama_cuti'         => $lama_cuti,
            'jenis_waktu'       => Request()->jenis_waktu,
            'mulai_tanggal'     => $mulai_tanggal,
            'akhir_tanggal'     => $akhir_tanggal,
            'alamat_selama_cuti' => Request()->alamat_selama_cuti,
            'status_pengajuan'  => 'Persiapan',
            'tanggal_pengajuan' => date('Y-m-d H:s:i'),
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

        $detail = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);
        $tanggalPengajuan = date('d F Y', strtotime($detail->tanggal_pengajuan));

        if ($detail->tanggal_pegawai) {
            $tanggalPegawai = date('d F Y H:s', strtotime($detail->tanggal_pegawai));
            $QRPegawai = QrCode::size(100)->generate("Pengajuan Cuti:\nNama Pegawai: {$detail->nama}\nTanggal Pengajuan: {$tanggalPengajuan}\n\nMengajukan\nTanggal : {$tanggalPegawai}\n\nNama Pegawai : {$detail->nama}\nNIP : {$detail->nip}");
        } else {
            $QRPegawai = null;
        }
        if ($detail->tanggal_kajur) {
            $tanggalKajur = date('d F Y H:s', strtotime($detail->tanggal_kajur));
            $QRKajur = QrCode::size(100)->generate("Pengajuan Cuti:\nNama Pegawai: {$detail->nama}\nTanggal Pengajuan: {$tanggalPengajuan}\n\nMenyetujui\nTanggal : {$tanggalKajur}\n\nNama Ketua Jurusan : {$detail->ketua_jurusan}\nNIP : {$detail->nip_ketua_jurusan}");
        } else {
            $QRKajur = null;
        }
        if ($detail->tanggal_wadir2) {
            $tanggalWadir2 = date('d F Y H:s', strtotime($detail->tanggal_wadir2));
            $QRWadir2 = QrCode::size(100)->generate("Pengajuan Cuti:\nNama Pegawai: {$detail->nama}\nTanggal Pengajuan: {$tanggalPengajuan}\n\nMenyetujui\nTanggal : {$tanggalWadir2}\n\nNama Wakil Direktur 2 : {$detail->wakil_direktur}\nNIP : {$detail->nip_wakil_direktur}");
        } else {
            $QRWadir2 = null;
        }

        $data = [
            'title'     => 'Pengajuan Cuti',
            'subTitle'  => 'Detail Pengajuan Cuti',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'QRPegawai' => $QRPegawai,
            'QRKajur' => $QRKajur,
            'QRWadir2' => $QRWadir2,
            'detail'    => $detail
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
            'pegawai'   => $this->ModelPegawai->detailByIdUser(Session()->get('id_user')),
            'detail'    => $this->ModelPengajuanCuti->detail($id_pengajuan_cuti)
        ];

        return view('pegawai.pengajuancuti.edit', $data);
    }

    public function editProcess($id_pengajuan_cuti)
    {
        Request()->validate([
            'jenis_cuti'            => 'required',
            'alasan_cuti'           => 'required',
            'jenis_waktu'           => 'required',
            'alamat_selama_cuti'    => 'required',

        ], [
            'jenis_cuti.required'           => 'Jenis cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'alasan_cuti.required'          => 'Alasan cuti harus diisi!',
            'jenis_waktu.required'          => 'Jenis waktu harus diisi!',
            'alamat_selama_cuti.required'   => 'Alamat selama cuti harus diisi!',

        ]);

        $lama_cuti = "";
        foreach (Request()->lama_cuti as $item) {
            $lama_cuti = $lama_cuti . "|" . $item;
        }
        $mulai_tanggal = "";
        foreach (Request()->mulai_tanggal as $item) {
            $mulai_tanggal = $mulai_tanggal . "|" . $item;
        }
        $akhir_tanggal = "";
        foreach (Request()->akhir_tanggal as $item) {
            $akhir_tanggal = $akhir_tanggal . "|" . $item;
        }

        $pengajuanCuti = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);
        $detailPegawai = $this->ModelPegawai->detail($pengajuanCuti->id_pegawai);

        if ($pengajuanCuti->jenis_cuti === 'Cuti Tahunan') {
            if ($pengajuanCuti->tahun_cuti === '(N-2) 2 Tahun Sebelumnya') {
                $dataPegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n_2'        => $detailPegawai->cuti_n_2 + $pengajuanCuti->lama_cuti,
                ];
            } elseif ($pengajuanCuti->tahun_cuti === '(N-1) 1 Tahun Sebelumnya') {
                $dataPegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n_1'        => $detailPegawai->cuti_n_1 + $pengajuanCuti->lama_cuti,
                ];
            } elseif ($pengajuanCuti->tahun_cuti === '(N) Tahun Berjalan') {
                $dataPegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n'        => $detailPegawai->cuti_n + $pengajuanCuti->lama_cuti,
                ];
            }
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Besar') {
            $dataPegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_besar'        => $detailPegawai->cuti_besar - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Sakit') {
            $dataPegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_sakit'        => $detailPegawai->cuti_sakit - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Melahirkan') {
            $dataPegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_melahirkan'        => $detailPegawai->cuti_melahirkan - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Karena Alasan Penting') {
            $dataPegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_karena_alasan_penting'        => $detailPegawai->cuti_karena_alasan_penting - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti di Luar Tanggungan Negara') {
            $dataPegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_diluar_tanggungan_negara'        => $detailPegawai->cuti_diluar_tanggungan_negara - $pengajuanCuti->lama_cuti,
            ];
        }
        $this->ModelPegawai->edit($dataPegawai);

        $user = $this->ModelUser->detail(Session()->get('id_user'));
        $detailPegawai = $this->ModelPegawai->detail(Request()->id_pegawai);

        if (Request()->jenis_cuti === 'Cuti Tahunan') {
            $tahun_cuti = Request()->tahun_cuti;
            if (Request()->tahun_cuti === '(N-2) 2 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n_2'        => $detailPegawai->cuti_n_2 - Request()->lama_cuti,
                ];
            } elseif (Request()->tahun_cuti === '(N-1) 1 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n_1'        => $detailPegawai->cuti_n_1 - Request()->lama_cuti,
                ];
            } elseif (Request()->tahun_cuti === '(N) Tahun Berjalan') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_n'        => $detailPegawai->cuti_n - Request()->lama_cuti,
                ];
            }
        } else {
            $tahun_cuti = null;

            if (Request()->jenis_cuti === 'Cuti Besar') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_besar'        => $detailPegawai->cuti_besar + Request()->lama_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Sakit') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_sakit'        => $detailPegawai->cuti_sakit + Request()->lama_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Melahirkan') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_melahirkan'        => $detailPegawai->cuti_melahirkan + Request()->lama_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti Karena Alasan Penting') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_karena_alasan_penting'        => $detailPegawai->cuti_karena_alasan_penting + Request()->lama_cuti,
                ];
            } elseif (Request()->jenis_cuti === 'Cuti di Luar Tanggungan Negara') {
                $pegawai = [
                    'id_pegawai'    => Request()->id_pegawai,
                    'cuti_diluar_tanggungan_negara'        => $detailPegawai->cuti_diluar_tanggungan_negara + Request()->lama_cuti,
                ];
            }
        }
        $this->ModelPegawai->edit($pegawai);

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'id_pegawai'        => Request()->id_pegawai,
            'jenis_cuti'        => Request()->jenis_cuti,
            'tahun_cuti'        => $tahun_cuti,
            'alasan_cuti'       => Request()->alasan_cuti,
            'lama_cuti'         => $lama_cuti,
            'jenis_waktu'       => Request()->jenis_waktu,
            'mulai_tanggal'     => $mulai_tanggal,
            'akhir_tanggal'     => $akhir_tanggal,
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
        $pengajuanCuti = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);
        $detailPegawai = $this->ModelPegawai->detail($pengajuanCuti->id_pegawai);

        if ($pengajuanCuti->jenis_cuti === 'Cuti Tahunan') {
            if ($pengajuanCuti->tahun_cuti === '(N-2) 2 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n_2'        => $detailPegawai->cuti_n_2 + $pengajuanCuti->lama_cuti,
                ];
            } elseif ($pengajuanCuti->tahun_cuti === '(N-1) 1 Tahun Sebelumnya') {
                $pegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n_1'        => $detailPegawai->cuti_n_1 + $pengajuanCuti->lama_cuti,
                ];
            } elseif ($pengajuanCuti->tahun_cuti === '(N) Tahun Berjalan') {
                $pegawai = [
                    'id_pegawai'    => $pengajuanCuti->id_pegawai,
                    'cuti_n'        => $detailPegawai->cuti_n + $pengajuanCuti->lama_cuti,
                ];
            }
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Besar') {
            $pegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_besar'        => $detailPegawai->cuti_besar - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Sakit') {
            $pegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_sakit'        => $detailPegawai->cuti_sakit - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Melahirkan') {
            $pegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_melahirkan'        => $detailPegawai->cuti_melahirkan - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti Karena Alasan Penting') {
            $pegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_karena_alasan_penting'        => $detailPegawai->cuti_karena_alasan_penting - $pengajuanCuti->lama_cuti,
            ];
        } elseif ($pengajuanCuti->jenis_cuti === 'Cuti di Luar Tanggungan Negara') {
            $pegawai = [
                'id_pegawai'    => $pengajuanCuti->id_pegawai,
                'cuti_diluar_tanggungan_negara'        => $detailPegawai->cuti_diluar_tanggungan_negara - $pengajuanCuti->lama_cuti,
            ];
        }
        $this->ModelPegawai->edit($pegawai);

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

    public function sendToKetuaJurusan($id_pengajuan_cuti)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $pengajuanCuti = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);

        $noHp = substr($pengajuanCuti->nomor_telepon, 1);

        // SENDTALK
        $token = '44bb121d5766b78b889104626af2570d593678b01586ffac1a43e565e47cff33';
        $whatsapp_phone = '+62' . $noHp;

        $message = "Hallo {$pengajuanCuti->nama}!\n\nAnda sedang melakukan pengajuan cuti dan status pengajuan cuti Anda sedang dikirim ke Ketua Jurusan. Silahkan di cek di website SIMPEG Polsub!";

        $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

        $data = [
            "phone" => $whatsapp_phone,
            "messageType" => "text",
            "body" => $message
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "API-Key: $token",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($curl);
        curl_close($curl);

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        $data = [
            'id_pengajuan_cuti' => $id_pengajuan_cuti,
            'status_pengajuan'  => 'Dikirim ke Ketua Jurusan',
            'tanda_tangan_pegawai'   => $user->tanda_tangan,
            'tanggal_pegawai'   => date('Y-m-d H:s:i'),
        ];
        $this->ModelPengajuanCuti->edit($data);

        if ($user->role == 'Pegawai') {
            $route = 'pengajuan-cuti';
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'pengajuan-cuti-ketua-jurusan';
        }

        foreach ($this->ModelPegawai->getData() as $item) {
            if ($item->unit_kerja === $pengajuanCuti->unit_kerja && $item->role === 'Ketua Jurusan') {
                $noHp = substr($item->nomor_telepon, 1);

                // SENDTALK
                $token = '44bb121d5766b78b889104626af2570d593678b01586ffac1a43e565e47cff33';
                $whatsapp_phone = '+62' . $noHp;

                $message = "Hallo {$item->nama}!\n\nAda pegawai yang melakukan pengajuan cuti. Silahkan di cek di website SIMPEG Polsub!";

                $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

                $data = [
                    "phone" => $whatsapp_phone,
                    "messageType" => "text",
                    "body" => $message
                ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $headers = array(
                    "API-Key: $token",
                    "Content-Type: application/json",
                );
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                //for debug only!
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

                curl_exec($curl);
                curl_close($curl);
            }
        }


        return redirect()->route($route)->with('berhasil', 'Data pengajuan cuti berhasil dikirim !');
    }

    public function generateQrPegawai($id_pengajuan_cuti)
    {
        $data = $this->ModelPengajuanCuti->detail($id_pengajuan_cuti);

        $qrcode = QrCode::size(400)->generate($data->nama);
        return view('qrcode.pegawai', compact('qrcode'));
    }
}
