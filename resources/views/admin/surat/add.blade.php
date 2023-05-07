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
                            <form action="/tambah-surat" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Pegawai</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="id_pegawai">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    @foreach ($dataPegawai as $item)
                                                        <option value="{{$item->id_pegawai}}">{{$item->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('id_pegawai')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">No. Surat</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="no_surat" placeholder="Masukkan No. Surat" value="{{ old('no_surat') }}">
                                            </div>
                                            @error('no_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tujuan Surat</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="tujuan_surat" placeholder="Masukkan Tujuan Surat" value="{{ old('tujuan_surat') }}">
                                            </div>
                                            @error('tujuan_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Jenis Surat</label>
                                            <div class="form-group">
                                                <span class="la la-circle form-icon"></span>
                                                <input class="form-control" type="text" name="jenis_surat" placeholder="Masukkan Jenis Surat" value="{{ old('jenis_surat') }}">
                                            </div>
                                            @error('jenis_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">File Surat</label>
                                            <div class="file-upload-wrap file-upload-wrap-3">
                                                <input type="file" name="file_surat" class="multi file-upload-input with-preview" maxlength="3">
                                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload File</span>
                                            </div>
                                            @error('file_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/kelola-surat" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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