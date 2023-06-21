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
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Penerima</label>
                                            <div class="form-group select-contain w-100">
                                                <select class="select2 form-control" name="id_pegawai[]" id="id_pegawai" multiple>
                                                    <option value="">-- Pilih Pegawai --</option>
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
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">No. Surat</label>
                                            <div class="form-group">
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
                                            <label class="label-text">Perihal Surat</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="perihal_surat" placeholder="Masukkan Perihal Surat" value="{{ old('perihal_surat') }}">
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
                                                    <option value="">-- Pilih --</option>
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
                                                <input class="form-control" type="datetime-local" name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
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
                                                <input class="form-control" type="text" name="tempat" placeholder="Masukkan Tempat" value="{{ old('tempat') }}">
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
                                            <div class="form-group">
                                                <input type="file" name="file_surat" class="form-control" maxlength="3" required>
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

{{-- <script>
    $(document).ready(function() {
        // Mengambil data dari model User (contoh)
        var users = {!! json_encode($users) !!};

        // Mengisi data ke dalam elemen select
        $.each(users, function(index, user) {
            $('#nama_select').append($('<option>', {
                value: user.id,
                text: user.name
            }));
        });

        // Menginisialisasi Select2
        $('.select2').select2();
    });
</script> --}}