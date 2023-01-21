@extends('layoutAdmin.main')

@section('content')
<section>
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
                        <form action="/tambah-admin" method="Post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Nama Lengkap</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}" autofocus>
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
                                        <label class="label-text">No. Telepon</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('nomor_telepon') }}">
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
                                        <label class="label-text">Email</label>
                                        <div class="form-group">
                                            <span class="la la-envelope form-icon"></span>
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
                                        <label class="label-text">Password</label>
                                        <div class="form-group">
                                            <span class="la la-lock form-icon"></span>
                                            <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                        @error('password')
                                        <div style="margin-top: -16px">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="btn-box pt-3 pb-4">
                                <center>
                                    <button type="submit" class="theme-btn w-50">Simpan</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection