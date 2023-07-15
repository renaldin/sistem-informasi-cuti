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
                            <form action="/edit-artikel/{{$detail->id_artikel}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Judul <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="judul" placeholder="Masukkan Judul Artikel" value="{{ $detail->judul }}" autofocus>
                                            </div>
                                            @error('judul')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Status <span class="text-danger">*</span></label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="status">
                                                    <option value="{{$detail->status}}">{{$detail->status}}</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                            @error('status')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Dokumen <span class="text-danger">* File format .pdf</span></label>
                                            <div class="form-group">
                                                <input type="file" name="dokumen" class="form-control" maxlength="3">
                                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload File</span>
                                            </div>
                                            @error('dokumen')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Gambar <span class="text-danger">* File format .jpg/jpeg/png</span></label>
                                            <div class="form-group">
                                                <input type="file" name="gambar" class="form-control" maxlength="3">
                                                <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload File</span>
                                            </div>
                                            @error('gambar')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Deskripsi</label>
                                            <div class="form-group">
                                                <textarea class="message-control form-control" name="deskripsi" placeholder="Masukkan Deskripsi">{{$detail->deskripsi}}</textarea>
                                            </div>
                                            @error('deskripsi')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-5 text-center">
                                    <a href="/kelola-artikel" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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