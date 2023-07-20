<?php

namespace App\Console\Commands;


use App\Models\ModelUser;

use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class generatesurat extends Command
{
    public $ModelUser;
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
        $this->ModelUser = new ModelUser();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . Request()->nama . '.' . $file1->extension();


        $data = [
            'nama'              => 'a',
            'nomor_telepon'     => 'z',
            'nip'               => '1',
            'jurusan'           => '1',
            'email'             => '12',
            'password'          => '',
            'role'              => '',

        ];


        $this->ModelUser->add($data);
    }
}
