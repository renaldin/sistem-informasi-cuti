@extends('layout.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">{{ $subTitle }}</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" value="{{ $user->nama }}" disabled>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope form-icon"></span>
                                                <input class="form-control" type="text" value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Nomor Telepon</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" value="{{ $user->nomor_telepon }}" disabled>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Foto</label>
                                            <div class="form-group">
                                                <img src="@if($user->foto){{ asset('foto_user/'.$user->foto) }} @else {{ asset('foto_user/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt=""> 
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Ubah Profil</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="@if($user->role === 'Admin') /profil-admin/{{$user->id_user}} @elseif($user->role === 'Wakil Direktur') /profil-wadir/{{$user->id_user}} @elseif($user->role === 'Ketua Jurusan') /profil-kajur/{{$user->id_user}} @elseif($user->role === 'Pegawai') /profil/{{$user->id_user}} @endif" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-2">
                                            @if (session('berhasil'))    
                                                <div class="alert bg-primary text-white alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                                    {{ session('berhasil') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" name="nama" type="text" value="{{ $user->nama }}">
                                                @error('nama')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">NIP</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="number" name="nip" placeholder="Masukkan NIP" value="{{ $detail->nip }}">
                                            </div>
                                            @error('nip')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" name="email" type="text" value="{{ $user->email }}">
                                                @error('email')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Nomor Telepon</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" name="nomor_telepon" type="number" value="{{ $user->nomor_telepon }}">
                                                @error('nomor_telepon')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Foto</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" name="foto_user" type="file">
                                                @error('foto_user')
                                                <div style="margin-top: -16px">
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box" style="float: right">
                                            <button class="theme-btn" type="submit">Simpan</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Ubah Password</h3>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="@if($user->role === 'Admin') /ubah-password-admin/{{$user->id_user}} @elseif($user->role === 'Wakil Direktur') /ubah-password-wadir/{{$user->id_user}} @elseif($user->role === 'Ketua Jurusan') /ubah-password-kajur/{{$user->id_user}} @elseif($user->role === 'Pegawai') /ubah-password/{{$user->id_user}} @endif" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-2">
                                            @if (session('berhasil-ubah-password'))    
                                                <div class="alert bg-primary text-white alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                                    {{ session('berhasil-ubah-password') }}
                                                </div>
                                            @endif
                                            @if (session('gagal-ubah-password'))    
                                                <div class="alert bg-danger text-white alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                                    {{ session('gagal-ubah-password') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Password Lama</label>
                                            <div class="form-group">
                                                <span class="la la-lock form-icon"></span>
                                                <input class="form-control" name="password_lama" type="password" placeholder="Password Lama">
                                                @error('password_lama')
                                                <div>
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Password< Baru</label>
                                            <div class="form-group">
                                                <span class="la la-lock form-icon"></span>
                                                <input class="form-control" name="password_baru" type="password" placeholder="Password Baru">
                                                @error('password_baru')
                                                <div>
                                                    <small class="text-danger">{{ $message }}</small>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="btn-box" style="float: right">
                                            <button class="theme-btn" type="submit">Simpan</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
        {{-- footer --}}
        @include('layout.footer')
        {{-- end footer --}}
    </div>
</div>
@endsection