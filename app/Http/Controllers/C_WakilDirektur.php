<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelSetting;
use App\Models\ModelPegawai;
use Illuminate\Support\Facades\Hash;

class C_WakilDirektur extends Controller
{

    private $ModelUser;
    private $ModelSetting;
    private $ModelPegawai;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelSetting = new ModelSetting();
        $this->ModelPegawai = new ModelPegawai();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Wakil Direktur',
            'subTitle'      => 'Kelola Wakil Direktur',
            'biodata'       => $this->ModelSetting->detail(1),
            'user'          => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPegawai'   => $this->ModelPegawai->getData()
        ];

        return view('admin.wakilDirektur.data', $data);
    }

    public function detail($id_pegawai)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Wakil Direktur',
            'subTitle'  => 'Detail Wakil Direktur',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPegawai->detail($id_pegawai)
        ];

        return view('admin.wakilDirektur.detail', $data);
    }

    public function add()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Wakil Direktur',
            'subTitle'  => 'Tambah Wakil Direktur',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('admin.wakilDirektur.add', $data);
    }

    public function addProcess()
    {
        Request()->validate([
            'email'                         => 'required|unique:users,email|email',
            'password'                      => 'min:6|required',
            'role'                          => 'required',
            'foto_user'                     => 'required|mimes:jpeg,png,jpg|max:2048',
            'nama'                          => 'required',
            'nomor_telepon'                 => 'required|numeric',
            'nip'                           => 'required|numeric',
            'jabatan'                       => 'required',
            'unit_kerja'                    => 'required',
            'masa_kerja'                    => 'required',
            // 'cuti_n_2'                      => 'required',
            // 'cuti_n_1'                      => 'required',
            // 'cuti_n'                        => 'required',
            // 'keterangan_n_2'                => 'required',
            // 'keterangan_n_1'                => 'required',
            // 'keterangan_n'                  => 'required',
            // 'cuti_besar'                    => 'required',
            // 'cuti_sakit'                    => 'required',
            // 'cuti_melahirkan'               => 'required',
            // 'cuti_karena_alasan_penting'    => 'required',
            // 'cuti_diluar_tanggungan_negara' => 'required',
        ], [
            'email.required'                            => 'Email harus diisi!',
            'email.unique'                              => 'Email sudah digunakan!',
            'email.email'                               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'                         => 'Password harus diisi!',
            'password.min'                              => 'Password minimal 6 karakter!',
            'role.required'                             => 'Role harus diisi!',
            'foto_user.required'                        => 'Foto Anda harus diisi!',
            'foto_user.mimes'                           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'                             => 'Ukuran Foto Anda maksimal 2 mb',
            'nama.required'                             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'                    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'                     => 'Nomor telepon harus angka!',
            'nip.required'                              => 'NIP/NIK harus diisi!',
            'nip.numeric'                               => 'NIP/NIK harus angka!',
            'jabatan.required'                          => 'Jabatan harus diisi!',
            'unit_kerja.required'                       => 'Unit kerja harus diisi!',
            'masa_kerja.required'                       => 'Masa kerja harus diisi!',
            // 'cuti_n_2.required'                         => 'Sisa Cuti 2 Tahun Sebelumnya (N-2) harus diisi!',
            // 'cuti_n_1.required'                         => 'Sisa Cuti 1 Tahun Sebelumnya (N-1) harus diisi!',
            // 'cuti_n.required'                           => 'Sisa Cuti Tahun Berjalan (N) harus diisi!',
            // 'keterangan_n_2.required'                   => 'Keterangan Sisa Cuti 2 Tahun Sebelumnya (N-2) harus diisi!',
            // 'keterangan_n_1.required'                   => 'Keterangan Sisa Cuti 1 Tahun Sebelumnya (N-1) harus diisi!',
            // 'keterangan_n.required'                     => 'Keterangan Sisa Cuti Tahun Berjalan (N) harus diisi!',
            // 'cuti_besar.required'                       => 'Cuti besar harus diisi!',
            // 'cuti_sakit.required'                       => 'Cuti sakit harus diisi!',
            // 'cuti_melahirkan.required'                  => 'Cuti melahirkan harus diisi!',
            // 'cuti_karena_alasan_penting.required'       => 'Cuti karena alasan penting harus diisi!',
            // 'cuti_diluar_tanggungan_negara.required'    => 'Cuti diluar tanggungan negara harus diisi!',
        ]);

        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . Request()->nama . '.' . $file1->extension();
        $file1->move(public_path('foto_user'), $fileUser);

        $dataUser = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'nip'               => Request()->nip,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
            'role'              => Request()->role,
            'foto'              => $fileUser,
        ];
        $this->ModelUser->add($dataUser);

        $dataUserAkhir = $this->ModelUser->getLastData();

        $dataPegawai = [
            'id_user'                       => $dataUserAkhir->id_user,
            'jabatan'                       => Request()->jabatan,
            'unit_kerja'                    => Request()->unit_kerja,
            'masa_kerja'                    => Request()->masa_kerja,
            'cuti_n_2'                      => Request()->cuti_n_2,
            'cuti_n_1'                      => Request()->cuti_n_1,
            'cuti_n'                        => Request()->cuti_n,
            'keterangan_n_2'                => Request()->keterangan_n_2,
            'keterangan_n_1'                => Request()->keterangan_n_1,
            'keterangan_n'                  => Request()->keterangan_n,
            'cuti_besar'                    => Request()->cuti_besar,
            'cuti_sakit'                    => Request()->cuti_sakit,
            'cuti_melahirkan'               => Request()->cuti_melahirkan,
            'cuti_karena_alasan_penting'    => Request()->cuti_karena_alasan_penting,
            'cuti_diluar_tanggungan_negara' => Request()->cuti_diluar_tanggungan_negara,
        ];

        $this->ModelPegawai->add($dataPegawai);
        return redirect()->route('kelola-wakil-direktur')->with('berhasil', 'Data Wakil Direktur berhasil ditambahkan !');
    }

    public function edit($id_pegawai)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Wakil Direktur',
            'subTitle'  => 'Edit Wakil Direktur',
            'biodata'   => $this->ModelSetting->detail(1),
            'user'      => $this->ModelUser->detail(Session()->get('id_user')),
            'detail'    => $this->ModelPegawai->detail($id_pegawai)
        ];

        return view('admin.wakilDirektur.edit', $data);
    }

    public function editProcess($id_pegawai)
    {
        Request()->validate([
            'email'                         => 'required|email',
            'role'                          => 'required',
            'foto_user'                     => 'mimes:jpeg,png,jpg|max:2048',
            'nama'                          => 'required',
            'nomor_telepon'                 => 'required|numeric',
            'nip'                           => 'required|numeric',
            'jabatan'                       => 'required',
            'unit_kerja'                    => 'required',
            'masa_kerja'                    => 'required',
        ], [
            'email.required'                            => 'Email harus diisi!',
            'email.email'                               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto_user.required'                        => 'Foto Anda harus diisi!',
            'foto_user.mimes'                           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'                             => 'Ukuran Foto Anda maksimal 2 mb',
            'nama.required'                             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'                    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'                     => 'Nomor telepon harus angka!',
            'nip.required'                              => 'NIP/NIK harus diisi!',
            'nip.numeric'                               => 'NIP/NIK harus angka!',
            'jabatan.required'                          => 'Jabatan harus diisi!',
            'unit_kerja.required'                       => 'Unit kerja harus diisi!',
            'masa_kerja.required'                       => 'Masa kerja harus diisi!',
        ]);

        if (Request()->foto_user <> "") {
            $pegawai = $this->ModelPegawai->detail($id_pegawai);
            $user = $this->ModelUser->detail($pegawai->id_user);

            if ($user->foto <> "") {
                unlink(public_path('foto_user') . '/' . $user->foto);
            }

            $file1 = Request()->foto_user;
            $fileUser = date('mdYHis') . Request()->nama . '.' . $file1->extension();
            $file1->move(public_path('foto_user'), $fileUser);

            $dataUser = [
                'id_user'           => $user->id_user,
                'nama'              => Request()->nama,
                'nomor_telepon'     => Request()->nomor_telepon,
                'nip'               => Request()->nip,
                'email'             => Request()->email,
                'role'              => Request()->role,
                'foto'              => $fileUser,
            ];
            $this->ModelUser->edit($dataUser);

            $dataPegawai = [
                'id_pegawai'                    => $pegawai->id_pegawai,
                'id_user'                       => $user->id_user,
                'jabatan'                       => Request()->jabatan,
                'unit_kerja'                    => Request()->unit_kerja,
                'masa_kerja'                    => Request()->masa_kerja,
                'cuti_n_2'                      => Request()->cuti_n_2,
                'cuti_n_1'                      => Request()->cuti_n_1,
                'cuti_n'                        => Request()->cuti_n,
                'keterangan_n_2'                => Request()->keterangan_n_2,
                'keterangan_n_1'                => Request()->keterangan_n_1,
                'keterangan_n'                  => Request()->keterangan_n,
                'cuti_besar'                    => Request()->cuti_besar,
                'cuti_sakit'                    => Request()->cuti_sakit,
                'cuti_melahirkan'               => Request()->cuti_melahirkan,
                'cuti_karena_alasan_penting'    => Request()->cuti_karena_alasan_penting,
                'cuti_diluar_tanggungan_negara' => Request()->cuti_diluar_tanggungan_negara,
            ];
        } else {
            $pegawai = $this->ModelPegawai->detail($id_pegawai);
            $user = $this->ModelUser->detail($pegawai->id_user);

            $dataUser = [
                'id_user'           => $user->id_user,
                'nama'              => Request()->nama,
                'nomor_telepon'     => Request()->nomor_telepon,
                'nip'               => Request()->nip,
                'email'             => Request()->email,
                'role'              => Request()->role,
            ];
            $this->ModelUser->edit($dataUser);

            $dataPegawai = [
                'id_pegawai'                    => $pegawai->id_pegawai,
                'id_user'                       => $user->id_user,
                'jabatan'                       => Request()->jabatan,
                'unit_kerja'                    => Request()->unit_kerja,
                'masa_kerja'                    => Request()->masa_kerja,
                'cuti_n_2'                      => Request()->cuti_n_2,
                'cuti_n_1'                      => Request()->cuti_n_1,
                'cuti_n'                        => Request()->cuti_n,
                'keterangan_n_2'                => Request()->keterangan_n_2,
                'keterangan_n_1'                => Request()->keterangan_n_1,
                'keterangan_n'                  => Request()->keterangan_n,
                'cuti_besar'                    => Request()->cuti_besar,
                'cuti_sakit'                    => Request()->cuti_sakit,
                'cuti_melahirkan'               => Request()->cuti_melahirkan,
                'cuti_karena_alasan_penting'    => Request()->cuti_karena_alasan_penting,
                'cuti_diluar_tanggungan_negara' => Request()->cuti_diluar_tanggungan_negara,
            ];
        }

        $this->ModelPegawai->edit($dataPegawai);
        return redirect()->route('kelola-wakil-direktur')->with('berhasil', 'Data Wakil Direktur berhasil diedit !');
    }

    public function deleteProcess($id_pegawai)
    {
        $pegawai = $this->ModelPegawai->detail($id_pegawai);
        $user = $this->ModelUser->detail($pegawai->id_user);

        if ($user->foto <> "") {
            unlink(public_path('foto_user') . '/' . $user->foto);
        }

        $this->ModelUser->deleteData($pegawai->id_user);
        $this->ModelPegawai->deleteData($id_pegawai);
        return redirect()->route('kelola-wakil-direktur')->with('berhasil', 'Data Wakil Direktur berhasil dihapus !');
    }
}
