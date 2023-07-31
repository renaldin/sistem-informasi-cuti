<?php

namespace App\Console\Commands;


use App\Models\ModelSurat;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class generatesurat extends Command
{
    public $ModelSurat;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'surat:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->ModelSurat = new ModelSurat();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Jakarta');

        $pegawai = $this->ModelSurat->getDataPegawai();
        // dd($pegawai);

        foreach ($pegawai as $item) {

            if ($item->status_surat == 'Belum Dikirim') {

                $datetime = new DateTime($item->tanggal);
                $interval = new DateInterval('PT30M');
                $datetime->sub($interval);
                $hasil = $datetime->format('Y-m-d H:i:s');
                $sekarang = date('Y-m-d H:s:i');

                // if ($sekarang > $hasil && $sekarang < $item->tanggal) {
                //     dd(true);
                // } else {
                //     dd(false);
                // }

                if ($sekarang > $hasil && $sekarang < $item->tanggal) {
                    // dd(true);
                    $noHp = substr($item->nomor_telepon, 1);
                    $jam = date('H:i', strtotime($item->tanggal));
                    $tanggal = date('d F Y', strtotime($item->tanggal));

                    $token = '44bb121d5766b78b889104626af2570d593678b01586ffac1a43e565e47cff33';
                    // $token = '2a140a453e7620e84a6ad72dea40293b551de320989bd94c87a667d0b2c6a886';

                    $whatsapp_phone = "+62" . $noHp;

                    $url = "https://sendtalk-api.taptalk.io/api/v1/message/send_whatsapp";

                    // $message = "hallo";
                    $message = "Hallo {$item->nama}!\n\nAda pemberitahuan rapat buat Anda dengan deskripsi sebagai berikut:\n\nPerihal : {$item->perihal_surat}\nTanggal : {$item->hari}, {$tanggal}\nJam : {$jam}\nTempat : {$item->tempat}\n\nWaktu rapat memasuki 30 menit terakhir, dimohon segera datang ke tempat rapat!!!\nTerima kasih.";

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

                    $dataSurat = [
                        'id_surat'      => $item->id_surat,
                        'status_surat'  => 'Sudah Dikirim'
                    ];
                    $this->ModelSurat->edit($dataSurat);
                } else {
                    dd(false);
                }
            }
        }
    }
}
