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
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Data Akun</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email</label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Masukkan Email" value="{{ $detail->email }}" readonly>
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
                                            <label class="label-text">Role</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="role" disabled>
                                                    <option value="{{$detail->role}}">{{$detail->role}}</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Pejabat">Pejabat</option>
                                                    <option value="Atasan">Atasan</option>
                                                    <option value="Pegawai">Pegawai</option>
                                                </select>
                                            </div>
                                            @error('role')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Foto</label>
                                            <div class="form-group">
                                                <img src="@if($detail->foto){{ asset('foto_user/'.$detail->foto) }} @else {{ asset('foto_user/default1.jpg') }} @endif" class="user-pro-img" style="width: 8rem;" alt="Foto User"> 
                                            </div>
                                        </div>          
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Data Pegawai</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Nama Lengkap + Gelar</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" value="{{ $detail->nama }}" readonly >
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
                                                <input class="form-control" type="number" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="{{ $detail->nomor_telepon }}" readonly>
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
                                            <label class="label-text">NIP/NIK</label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nip" placeholder="Masukkan NIP/NIK" value="{{ $detail->nip }}" readonly>
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
                                            <label class="label-text">Jabatan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="jabatan" placeholder="Masukkan Jabatan" value="{{ $detail->jabatan }}" readonly>
                                            </div>
                                            @error('jabatan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Unit Kerja</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" value="{{ $detail->unit_kerja }}" readonly>
                                            </div>
                                            @error('unit_kerja')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Masa Kerja</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="masa_kerja" placeholder="Masukkan Masa Kerja" value="{{ $detail->masa_kerja }}" readonly>
                                            </div>
                                            @error('masa_kerja')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Catatan Cuti</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti 2 Tahun Sebelumnya (N-2)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n_2" placeholder="Masukkan N-2" value="{{ $detail->cuti_n_2 }}" readonly>
                                            </div>
                                            @error('cuti_n_2')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti 2 Tahun Sebelumnya (N-2)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n_2" placeholder="Masukkan Keterangan N-2" value="{{ $detail->keterangan_n_2 }}" readonly>
                                            </div>
                                            @error('keterangan_n_2')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti 1 Tahun Sebelumnya (N-1)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n_1" placeholder="Masukkan N-1" value="{{ $detail->cuti_n_1 }}" readonly>
                                            </div>
                                            @error('cuti_n_1')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti 1 Tahun Sebelumnya (N-1)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n_1" placeholder="Masukkan Keterangan N-1" value="{{ $detail->keterangan_n_1 }}" readonly>
                                            </div>
                                            @error('keterangan_n_1')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Sisa Cuti Tahun Berjalan (N)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_n" placeholder="Masukkan N" value="{{ $detail->cuti_n }}" readonly>
                                            </div>
                                            @error('cuti_n')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Keterangan Sisa Cuti Tahun Berjalan (N)</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="keterangan_n" placeholder="Masukkan Keterangan N" value="{{ $detail->keterangan_n }}" readonly>
                                            </div>
                                            @error('keterangan_n')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Besar</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_besar" placeholder="Masukkan Cuti Besar" value="{{ $detail->cuti_besar }}" readonly>
                                            </div>
                                            @error('cuti_besar')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Sakit</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_sakit" placeholder="Masukkan Cuti Sakit" value="{{ $detail->cuti_sakit }}" readonly>
                                            </div>
                                            @error('cuti_sakit')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Melahirkan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_melahirkan" placeholder="Masukkan Cuti Melahirkan" value="{{ $detail->cuti_melahirkan }}" readonly>
                                            </div>
                                            @error('cuti_melahirkan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Karena Alasan Penting</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_karena_alasan_penting" placeholder="Masukkan Cuti Karena Alasan Penting" value="{{ $detail->cuti_karena_alasan_penting }}" readonly>
                                            </div>
                                            @error('cuti_karena_alasan_penting')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Cuti Di Luar Tanggungan Negara</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="cuti_diluar_tanggungan_negara" placeholder="Masukkan Cuti Di Luar Tanggungan Negara" value="{{ $detail->cuti_diluar_tanggungan_negara }}" readonly>
                                            </div>
                                            @error('cuti_diluar_tanggungan_negara')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/kelola-pegawai" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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