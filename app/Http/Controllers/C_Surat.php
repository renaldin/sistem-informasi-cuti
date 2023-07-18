<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSurat;
use App\Models\ModelSetting;
use App\Models\ModelPegawai;
use PDF;
use Twilio\Rest\Client;

class C_Surat extends Controller
{

    private $ModelUser;
    private $ModelSurat;
    private $ModelSetting;
    private $ModelPegawai;
    private $public_path;

    public function __construct()
    {
        $this->ModelSurat = new ModelSurat();
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelPegawai = new ModelPegawai();
        $this->public_path = 'file_surat';
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
            'jenisSurat' => $this->ModelSurat->filter('jenis_surat'),
            'dataDetailSurat'   => $this->ModelSurat->getDataPegawai()
        ];

        return view('admin.surat.data', $data);
    }

    public function filter()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $user = $this->ModelUser->detail(Session()->get('id_user'));

        if ($user->role == 'Pegawai') {
            $route = 'pegawai.surat.filter';
            $dataUser = $this->ModelSurat->getDataPegawai();
        } elseif ($user->role == 'Bagian Umum') {
            $route = 'bagianumum.surat.filter';
            $dataUser = $this->ModelSurat->getDataPegawai();
        } elseif ($user->role == 'Wakil Direktur') {
            $route = 'wakildirektur.surat.filter';
            $dataUser = $this->ModelSurat->getDataPegawai();
        } elseif ($user->role == 'Ketua Jurusan') {
            $route = 'ketuajurusan.surat.filter';
            $dataUser = $this->ModelSurat->getDataPegawai();
        } elseif ($user->role == 'Admin') {
            $route = 'admin.surat.filter';
            $dataUser = $this->ModelSurat->getData();
        }

        if (Request()->jenis_filter === 'Jenis Surat') {
            $data = [
                'title'     => 'Data Surat',
                'subTitle'  => 'Kelola Surat',
                'biodata'   => $this->ModelSetting->detail(1),
                'user'      => $user,
                'dataSurat' => $dataUser,
                'filter'    => Request()->jenis_surat,
                'jenisSurat' => $this->ModelSurat->filter('jenis_surat'),
                'dataDetailSurat'   => $this->ModelSurat->getDataPegawai()
            ];
        }

        return view($route, $data);
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
        $fileSurat = date('mdYHis') . '' . Request()->no_surat . '.' . $file1->extension();
        $file1->move(public_path($this->public_path), $fileSurat);

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
            'status_surat'      => 'Sudah Dikirim',
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

        $getLastData = $this->ModelSurat->lastData();

        $detail = $this->ModelSurat->detailSuratPegawai($getLastData->id_surat);

        // WA GATEWAY
        foreach ($detail as $item) {
            $noHp = substr($item->nomor_telepon, 1);
            $jam = date('H:i', strtotime($item->tanggal));
            $tanggal = date('d F Y', strtotime($item->tanggal));
            $pdfUrl = "https://sistem-kepegawaian.elearningpolsub.com/file_surat/" . $fileSurat;

            // SENDTALK
            $token = '8233afc8ddee3653c46b286b9ee646bdad641929648039544f80a615edc2cd25';
            $whatsapp_phone = '+62' . $noHp;

            $message = "Hallo {$item->nama}!\n\nAda pemberitahuan surat buat Anda dengan deskripsi sebagai berikut:\n\nNo. Surat : {$item->no_surat}\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nUntuk lebih jelasnya Anda bisa cek di website SIMPEG POLSUB!!!\n\nTerima kasih.";

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
                unlink(public_path($this->public_path) . '/' . $surat->file_surat);
            }

            $file = Request()->file_surat;
            $fileSurat = date('mdYHis') . ' ' . Request()->no_surat . '.' . $file->extension();
            $file->move(public_path($this->public_path), $fileSurat);

            $data = [
                'id_surat'          => $id_surat,
                // 'id_pegawai'        => Request()->id_pegawai,
                'no_surat'          => Request()->no_surat,
                'perihal_surat'      => Request()->perihal_surat,
                'hari'      => Request()->hari,
                'tanggal'      => Request()->tanggal,
                'tempat'      => Request()->tempat,
                'jenis_surat'       => Request()->jenis_surat,
                // 'status_terlaksana'       => Request()->status_terlaksana,
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
                // 'status_terlaksana'       => Request()->status_terlaksana,
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
            unlink(public_path($this->public_path) . '/' . $surat->file_surat);
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

        /// $sid    = "AC944f941fef8a459f011bb10c3236df78";
        // $token  = "df97bc683bb53f68b7bb6e2dd0274dc4";
        // $twilio = new Client($sid, $token);

        // $pdfUrl = "http://sistem-kepegawaian.elearningpolsub.com/cuti.pdf";

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:+62895336928026", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "Your appointment is coming up on July 21 at 3PM",
        //         )
        //     );
        // $message2 = $twilio->messages
        //     ->create(
        //         "whatsapp:+62895336928026", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             'mediaUrl' => $pdfUrl,
        //         )
        //     );

        // // print($message->sid);

        // dd('Stop');

        $data = [
            'id_surat'          => $id_surat,
            'status_surat'      => 'Sudah Dikirim',
        ];

        $detail = $this->ModelSurat->detailSuratPegawai($id_surat);

        // WA GATEWAY
        foreach ($detail as $item) {
            $noHp = substr($item->nomor_telepon, 1);
            $jam = date('H:i', strtotime($item->tanggal));
            $tanggal = date('d F Y', strtotime($item->tanggal));
            $pdfUrl = "http://sistem-kepegawaian.elearningpolsub.com/cuti.pdf";

            // $sid    = "AC944f941fef8a459f011bb10c3236df78";
            // $token  = "df97bc683bb53f68b7bb6e2dd0274dc4";
            $sid    = "ACb89b89cd3003458d790d6031c6a042a1";
            $token  = "90d43b2449cc80c3123ca6bda966a0ce";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+62" . $noHp, // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Hallo {$item->nama}!\n\nAda pemberitahuan surat buat Anda dengan deskripsi sebagai berikut:\n\nNo. Surat : {$item->no_surat}\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nUntuk lebih jelasnya Anda bisa cek suratnya dibawah ini!!!\n\nTerima kasih."
                    )
                );

            $message2 = $twilio->messages
                ->create(
                    "whatsapp:+62" . $noHp, // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        'mediaUrl' => $pdfUrl,
                    )
                );
        }

        $this->ModelSurat->edit($data);
        return redirect()->route('kelola-surat')->with('berhasil', 'Data surat berhasil dikirim ke pegawai !');
    }

    // public function reminder()
    // {
    //     if (!Session()->get('email')) {
    //         return redirect()->route('login');
    //     }

    //     $detail = $this->ModelSurat->detailSuratPegawai($id_surat);
    //     $pegawai = $this->ModelSurat->getDataPegawai();

    //     // $sid    = "ACb89b89cd3003458d790d6031c6a042a1";
    //     // $token  = "90d43b2449cc80c3123ca6bda966a0ce";
    //     // $twilio = new Client($sid, $token);

    //     // $message = $twilio->messages
    //     //     ->create(
    //     //         "whatsapp:+6288222245385", // to
    //     //         array(
    //     //             "from" => "whatsapp:+14155238886",
    //     //             "body" => "Datang Rapat"
    //     //         )
    //     //     );

    //     // print($message->sid);

    //     $now = time(); // Waktu sekarang dalam detik sejak UNIX Epoch
    //     $lessThan30Minutes = $now - (30 * 60); // Kurangi 30 menit (30 * 60 detik)

    //     // WA GATEWAY
    //     foreach ($pegawai as $row) {
    //         if ($row->tanggal > date('Y-m-d H:i:s', $lessThan30Minutes)) {
    //             $detail = $this->ModelSurat->detailSuratPegawai($row->id_surat);
    //             foreach ($detail as $item) {
    //                 if ($item->status_terlaksana === 'Belum') {
    //                     $noHp = substr($item->nomor_telepon, 1);
    //                     $jam = date('H:i', strtotime($item->tanggal));
    //                     $tanggal = date('d F Y', strtotime($item->tanggal));

    //                     // SENDTALK
    //                     $token = '2a140a453e7620e84a6ad72dea40293b551de320989bd94c87a667d0b2c6a886';
    //                     $whatsapp_phone = '+62' . $noHp;


    //                     $message = "Hallo {$item->nama}!\n\nAda pemberitahuan rapat buat Anda dengan deskripsi sebagai berikut:\n\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nWaktu rapat memasuki 30 menit terakhir, dimohon segera datang ke tempat rapat!!!\nTerima kasih.";

    //                     $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

    //                     $data = [
    //                         "phone" => $whatsapp_phone,
    //                         "messageType" => "text",
    //                         "documentUrl" => $message
    //                     ];

    //                     $curl = curl_init($url);
    //                     curl_setopt($curl, CURLOPT_URL, $url);
    //                     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //                     $headers = array(
    //                         "API-Key: $token",
    //                         "Content-Type: application/json",
    //                     );
    //                     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    //                     //for debug only!
    //                     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //                     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //                     curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    //                     curl_exec($curl);
    //                     curl_close($curl);

    //                     // $sid    = "AC944f941fef8a459f011bb10c3236df78";
    //                     // $token  = "df97bc683bb53f68b7bb6e2dd0274dc4";
    //                     // $sid    = "ACb89b89cd3003458d790d6031c6a042a1";
    //                     // $token  = "90d43b2449cc80c3123ca6bda966a0ce";
    //                     // $twilio = new Client($sid, $token);

    //                     // $message = $twilio->messages
    //                     //     ->create(
    //                     //         "whatsapp:+62" . $noHp, // to
    //                     //         array(
    //                     //             "from" => "whatsapp:+14155238886",
    //                     //             "body" => "Hallo {$item->nama}!\n\nAda pemberitahuan rapat buat Anda dengan deskripsi sebagai berikut:\n\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nWaktu rapat memasuki 30 menit terakhir, dimohon segera datang ke tempat rapat!!!\nTerima kasih."
    //                     //         )
    //                     //     );

    //                     // print($message->sid);
    //                 }
    //             }
    //         }
    //     }

    //     return redirect()->route('kelola-surat')->with('berhasil', 'Anda berhasil reminder pegawai !');
    // }
    public function reminder($id_surat)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $detail = $this->ModelSurat->detailSuratPegawai($id_surat);

        // $sid    = "ACb89b89cd3003458d790d6031c6a042a1";
        // $token  = "90d43b2449cc80c3123ca6bda966a0ce";
        // $twilio = new Client($sid, $token);

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:+6288222245385", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "Datang Rapat"
        //         )
        //     );

        // print($message->sid);

        // WA GATEWAY
        foreach ($detail as $item) {
            if ($item->status_terlaksana === 'Belum') {
                $noHp = substr($item->nomor_telepon, 1);
                $jam = date('H:i', strtotime($item->tanggal));
                $tanggal = date('d F Y', strtotime($item->tanggal));

                $token = '8233afc8ddee3653c46b286b9ee646bdad641929648039544f80a615edc2cd25';
                $whatsapp_phone = '+62' . $noHp;

                $message = "Hallo {$item->nama}!\n\nAda pemberitahuan rapat buat Anda dengan deskripsi sebagai berikut:\n\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nWaktu rapat memasuki 30 menit terakhir, dimohon segera datang ke tempat rapat!!!\nTerima kasih.";

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

                // SENDTALK
                // $token = '8233afc8ddee3653c46b286b9ee646bdad641929648039544f80a615edc2cd25';
                // $whatsapp_phone = '+6282249025414';


                // $message = "Hallo {$item->nama}!\n\nAda pemberitahuan rapat buat Anda dengan deskripsi sebagai berikut:\n\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nWaktu rapat memasuki 30 menit terakhir, dimohon segera datang ke tempat rapat!!!\nTerima kasih.";

                // $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

                // $data = [
                //     "phone" => $whatsapp_phone,
                //     "messageType" => "text",
                //     "documentUrl" => $message
                // ];

                // $curl = curl_init($url);
                // curl_setopt($curl, CURLOPT_URL, $url);
                // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                // $headers = array(
                //     "API-Key: $token",
                //     "Content-Type: application/json",
                // );
                // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                // //for debug only!
                // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

                // curl_exec($curl);
                // curl_close($curl);

            }
        }

        return redirect()->route('kelola-surat')->with('berhasil', 'Anda berhasil reminder pegawai !');
    }

    public function Whatsapp()
    {
        $token = '8233afc8ddee3653c46b286b9ee646bdad641929648039544f80a615edc2cd25';
        $whatsapp_phone = '+62895336928026';
        $message = "1 Peminjaman Masuk! \n\n Perlu persetujuan anda";

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
            'subTitle'      => 'Riwayat Surat Tugas',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'jenisSurat' => $this->ModelSurat->filter('jenis_surat'),
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
