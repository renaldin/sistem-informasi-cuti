@extends('layout.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div>
                            <h3 class="title">{{ $subTitle }}</h3>
                            <p class="font-size-14">Form {{ $subTitle }}</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="/tambah-user" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap + Gelar <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap + Gelar" value="{{ old('nama') }}" autofocus>
                                            </div>
                                            @error('nama')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">NIP/NIK <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nip" placeholder="Masukkan NIP/NIK" value="{{ old('nip') }}">
                                            </div>
                                            @error('nip')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">No. Telepon <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon') }}">
                                            </div>
                                            @error('nomor_telepon')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Password <span class="text-danger">*</span></label>
                                            <span class="label-text" style="float: right; cursor: pointer;" onclick="showPassword()">Show Password</span>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password">
                                            </div>
                                            @error('password')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Foto <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="file" name="foto_user">
                                            </div>
                                            @error('foto_user')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Role <span class="text-danger">*</span></label>
                                            <div class="form-group select-contain w-100">
                                                <select class="form-control" name="role" id="role" required>
                                                    <option value="">-- Pilih Role --</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Wakil Direktur">Wakil Direktur</option>
                                                    <option value="Ketua Jurusan">Ketua Jurusan</option>
                                                    <option value="Pegawai">Pegawai</option>
                                                    <option value="Bagian Umum">Bagian Umum</option>
                                                </select>
                                            </div>
                                            @error('role')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Hide / Show --}}
                                    <div class="col-lg-6 jurusan">
                                    </div>
                                    {{-- Hide / Show --}}
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/kelola-user" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
                                    <button type="submit" class="theme-btn theme-btn-small">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        
        {{-- footer --}}
        @include('layout.footer')
        {{-- end footer --}}
    </div>
</div>
@endsection