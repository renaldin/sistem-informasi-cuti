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
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Pegawai</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="id_pegawai" disabled>
                                                    <option value="{{$detail->id_pegawai}}">{{$detail->nama}}</option>
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
                                                <input class="form-control" type="text" name="no_surat" placeholder="Masukkan No. Surat" value="{{ $detail->no_surat }}" readonly>
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
                                                <input class="form-control" type="text" name="tujuan_surat" placeholder="Masukkan Tujuan Surat" value="{{ $detail->tujuan_surat }}" readonly>
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
                                                <input class="form-control" type="text" name="jenis_surat" placeholder="Masukkan Jenis Surat" value="{{ $detail->jenis_surat }}" readonly>
                                            </div>
                                            @error('jenis_surat')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>          
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <label class="label-text">File Surat</label>
                                    <iframe src="{{ asset('file_surat/'.$detail->file_surat) }}" frameborder="0" scrolling="auto" width="100%" height="500px"></iframe>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/kelola-surat" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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