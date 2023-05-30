<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;
use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use Illuminate\Support\Facades\Mail;

class C_Login extends Controller
{

    private $ModelAuth;
    private $ModelBiodataWeb;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (Session()->get('email')) {
            if (Session()->get('role') === 'Admin') {
                return redirect()->route('dashboardAdmin');
            } elseif (Session()->get('role') === 'Pegawai') {
                return redirect()->route('dashboardPegawai');
            } elseif (Session()->get('role') === 'Ketua Jurusan') {
                return redirect()->route('dashboardKetuaJurusan');
            } elseif (Session()->get('role') === 'Wakil Direktur') {
                return redirect()->route('dashboardWakilDirektur');
            } elseif (Session()->get('role') === 'Bagian Umum') {
                return redirect()->route('dashboardBagianUmum');
            }
        }

        $data = [
            'title' => 'Login',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.login', $data);
    }

    public function prosesLogin()
    {
        Request()->validate([
            'email'             => 'required|email',
            'password'          => 'min:6|required',
        ], [
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        $cekEmail = $this->ModelAuth->cekEmailUser(Request()->email);

        if ($cekEmail) {
            if ($cekEmail->role === "Pegawai") {
                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('role', $cekEmail->role);
                    Session()->put('log', true);

                    return redirect()->route('dashboardPegawai');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else if ($cekEmail->role === "Admin") {

                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('role', $cekEmail->role);
                    Session()->put('log', true);

                    return redirect()->route('dashboardAdmin');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else if ($cekEmail->role === "Wakil Direktur") {

                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('role', $cekEmail->role);
                    Session()->put('log', true);

                    return redirect()->route('dashboardWakilDirektur');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else if ($cekEmail->role === "Ketua Jurusan") {

                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('role', $cekEmail->role);
                    Session()->put('log', true);

                    return redirect()->route('dashboardKetuaJurusan');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else if ($cekEmail->role === "Bagian Umum") {

                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('role', $cekEmail->role);
                    Session()->put('log', true);

                    return redirect()->route('dashboardBagianUmum');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            }
        } else {
            return back()->with('gagal', 'Login gagal! Email belum terdaftar.');
        }
    }

    public function logout()
    {
        Session()->forget('id_user');
        Session()->forget('email');
        Session()->forget('role');
        Session()->forget('log');
        return redirect()->route('login')->with('berhasil', 'Logout berhasil!');
    }

    public function forgotPassword()
    {
        if (Session()->get('email')) {
            if (Session()->get('role') === 'Admin') {
                return redirect()->route('dashboardAdmin');
            } elseif (Session()->get('role') === 'Pegawai') {
                return redirect()->route('dashboardPegawai');
            } elseif (Session()->get('role') === 'Ketua Jurusan') {
                return redirect()->route('dashboardKetuaJurusan');
            } elseif (Session()->get('role') === 'Wakil Direktur') {
                return redirect()->route('dashboardWakilDirektur');
            } elseif (Session()->get('role') === 'Bagian Umum') {
                return redirect()->route('dashboardBagianUmum');
            }
        }

        $data = [
            'title'     => 'Lupa Password',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.lupaPassword', $data);
    }

    public function resetPassword($id_user)
    {
        if (Session()->get('email')) {
            if (Session()->get('role') === 'Admin') {
                return redirect()->route('dashboardAdmin');
            } elseif (Session()->get('role') === 'Pegawai') {
                return redirect()->route('dashboardPegawai');
            } elseif (Session()->get('role') === 'Ketua Jurusan') {
                return redirect()->route('dashboardKetuaJurusan');
            } elseif (Session()->get('role') === 'Wakil Direktur') {
                return redirect()->route('dashboardWakilDirektur');
            } elseif (Session()->get('role') === 'Bagian Umum') {
                return redirect()->route('dashboardBagianUmum');
            }
        }

        $data = [
            'title'     => 'Reset Password',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'user'      => $this->ModelUser->detail($id_user),
        ];

        return view('auth.resetPassword', $data);
    }

    public function forgotPasswordProcess()
    {
        $email = Request()->email;

        $data = $this->ModelUser->detailByEmail($email);

        if ($data) {

            $data_email = [
                'subject'       => 'Lupa Password',
                'sender_name'   => 'sisnawati2023@gmail.com',
                'urlUtama'      => 'http://127.0.0.1:8000',
                'urlReset'      => 'http://127.0.0.1:8000/reset-password/' . $data->id_user,
                'dataUser'      => $data,
                'biodata'       => $this->ModelBiodataWeb->detail(1),
            ];

            Mail::to($data->email)->send(new kirimEmail($data_email));
            return redirect()->route('login')->with('berhasil', 'Kami sudah kirim pesan ke email Anda. Silahkan cek email Anda!');
        } else {
            return back()->with('gagal', 'Email belum terdaftar. Silahkan hubungi Admin terlebih dahulu!');
        }
    }

    public function resetPasswordProcess($id_user)
    {
        Request()->validate([
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'min:6|required',
        ], [
            'password.required'    => 'Password baru harus diisi!',
            'password.min'         => 'Password baru minimal 6 karakter!',
            'password.confirmed'   => 'Password baru tidak sama!',
            'password_confirmation.required'    => 'Konfirmasi password harus diisi!',
            'password_confirmation.min'         => 'Konfirmasi password minimal 6 karakter!',
        ]);

        $data = [
            'id_user'       => $id_user,
            'password'      => Hash::make(Request()->password)
        ];

        $this->ModelUser->edit($data);
        return redirect()->route('login')->with('berhasil', 'Anda baru saja merubah password. Silahkan login!');
    }

    // public function prosesUbahPasswordAdmin()
    // {
    //     Request()->validate([
    //         'password' => 'min:6|required|confirmed',
    //     ], [
    //         'password.required'    => 'Password baru harus diisi!',
    //         'password.min'         => 'Password baru minimal 6 karakter!',
    //         'password.confirmed'   => 'Password baru tidak sama!',
    //     ]);

    //     $data = [
    //         'id_admin'         => Request()->id_admin,
    //         'password'          => Hash::make(Request()->password)
    //     ];

    //     $this->ModelAdmin->edit($data);
    //     return redirect()->route('admin')->with('berhasil', 'Anda baru saja merubah password. Silahkan login!');
    // }
}
