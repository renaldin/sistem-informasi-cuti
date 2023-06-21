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
                            <form action="/edit-surat/{{$detail->id_surat}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Penerima</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select2 form-control" name="id_pegawai" id="id_pegawai">
                                                    <option value="{{$detail->id_pegawai}}">{{$detail->nama}} | {{$detail->jabatan}}</option>
                                                    @foreach ($dataPegawai as $item)
                                                        <option value="{{$item->id_pegawai}}">{{$item->nama}} | {{$item->jabatan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('id_pegawai')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">No. Surat</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="no_surat" placeholder="Masukkan No. Surat" value="{{ $detail->no_surat }}">
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
                                            <label class="label-text">Perihal Surat</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="perihal_surat" placeholder="Masukkan Perihal Surat" value="{{ $detail->perihal_surat }}">
                                            </div>
                                            @error('perihal_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Hari</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="hari" id="hari" required>
                                                    @if ($detail->hari)
                                                    <option value="{{$detail->hari}}">{{$detail->hari}}</option>
                                                    @else
                                                    <option value="">-- Pilih --</option>
                                                    @endif
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jum'at">Jum'at</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                            </div>
                                            @error('hari')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal</label>
                                            <div class="form-group">
                                                <input class="form-control" type="datetime-local" name="tanggal" placeholder="Masukkan Tanggal" value="{{ $detail->tanggal }}">
                                            </div>
                                            @error('tanggal')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tempat</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="tempat" placeholder="Masukkan Tempat" value="{{ $detail->tempat }}">
                                            </div>
                                            @error('tempat')
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
                                                <input class="form-control" type="text" name="jenis_surat" placeholder="Masukkan Jenis Surat" value="{{ $detail->jenis_surat }}">
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
                                            <label class="label-text">Status Terlaksana</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="status_terlaksana" id="status_terlaksana" required>
                                                    @if ($detail->status_terlaksana)
                                                        <option value="{{$detail->status_terlaksana}}">{{$detail->status_terlaksana}}</option>
                                                    @else
                                                        <option value="">-- Pilih --</option>
                                                    @endif
                                                    <option value="Sudah">Sudah</option>
                                                    <option value="Belum">Belum</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                            @error('status_terlaksana')
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
                                <div class="col-lg-12 mt-3 text-center">
                                    <label class="label-text">File Surat</label>
                                    <iframe src="{{ asset('file_surat/'.$detail->file_surat) }}" frameborder="0" scrolling="auto" width="100%" height="500px"></iframe>
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