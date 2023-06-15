@extends('layout.main')

@section('content')
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div>
                            <h3 class="title">{{ $subTitle }} {{$detail->nama}}</h3>
                            <p class="font-size-14">{{ $subTitle }}</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="contact-form-action">
                            <form action="/izin-ketua-jurusan/{{$detail->id_pengajuan_cuti}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Pertimbangan Atasan Langsung **</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select-contain-select" name="pertimbangan_ketua_jurusan" id="pertimbangan_ketua_jurusan" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="DISETUJUI">DISETUJUI</option>
                                                    <option value="PERUBAHAN">PERUBAHAN</option>
                                                    <option value="DITANGGUHKAN">DITANGGUHKAN</option>
                                                    <option value="TIDAK DISETUJUI">TIDAK DISETUJUI</option>
                                                </select>
                                            </div>
                                            @error('pertimbangan_ketua_jurusan')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 alasan_pertimbangan_ketua_jurusan">
                                        {{-- <div class="input-box">
                                            <label class="label-text">Alasan Pertimbangan Atasan Langsung</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="alasan_pertimbangan_ketua_jurusan" placeholder="Silahkan isi alasannya..."></textarea>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/perizinan-cuti-atasan" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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