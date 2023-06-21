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
                            <form action="/tambah-pengajuan-cuti-ketua-jurusan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="input-box">
                                            <label class="label-text"><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong></label>
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
                                            <label class="label-text">Nama</label>
                                            <div class="form-group">
                                                <input class="form-control" type="hidden" name="id_pegawai" value="{{ $pegawai->id_pegawai }}" readonly>
                                                <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" value="{{ $pegawai->nama }}" readonly>
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
                                            <label class="label-text">NIP</label>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="nip" placeholder="Masukkan NIP" value="{{ $pegawai->nip }}" readonly>
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
                                                <input class="form-control" type="text" name="jabatan" placeholder="Masukkan Jabatan" value="{{ $pegawai->jabatan }}" readonly>
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
                                            <label class="label-text">Masa Kerja</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="masa_kerja" placeholder="Masukkan Masa Kerja" value="{{ $pegawai->masa_kerja }}" readonly>
                                            </div>
                                            @error('masa_kerja')
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
                                                <input class="form-control" type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" value="{{ $pegawai->unit_kerja }} POLITEKNIK NEGERI SUBANG" readonly>
                                            </div>
                                            @error('unit_kerja')
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
                                            <label class="label-text"><strong>Jenis Cuti Yang Diambil **</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Pilih Salah Satu</label>
                                            <div class="form-group d-flex align-items-center">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="cuti_tahunan" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_tahunan" name="jenis_cuti" value="Cuti Tahunan">
                                                            <span class="checkmark"></span>
                                                            <span>1. Cuti Tahunan</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_besar" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_besar" name="jenis_cuti" value="Cuti Besar">
                                                            <span class="checkmark"></span>
                                                            <span>2. Cuti Besar</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_sakit" class="radio-trigger mb-0 font-size-14 mr-3">
                                                            <input type="radio" id="cuti_sakit" name="jenis_cuti" value="Cuti Sakit">
                                                            <span class="checkmark"></span>
                                                            <span>3. Cuti Sakit</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_melahirkan" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_melahirkan" name="jenis_cuti" value="Cuti Melahirkan">
                                                            <span class="checkmark"></span>
                                                            <span>4. Cuti Melahirkan</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_karena_alasan_penting" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_karena_alasan_penting" name="jenis_cuti" value="Cuti Karena Alasan Penting">
                                                            <span class="checkmark"></span>
                                                            <span>5. Cuti Karena Alasan Penting</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="cuti_di_luar_tanggungan_negara" class="radio-trigger mb-0 font-size-14">
                                                            <input type="radio" id="cuti_di_luar_tanggungan_negara" name="jenis_cuti" value="Cuti di Luar Tanggungan Negara">
                                                            <span class="checkmark"></span>
                                                            <span>6. Cuti di Luar Tanggungan Negara</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('jenis_cuti')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Alasan Cuti</strong></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="alasan_cuti" placeholder="Masukkan Alasan Cuti" value="{{ old('alasan_cuti') }}">
                                            </div>
                                            @error('alasan_cuti')
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
                                            <label class="label-text"><strong>Lamanya Cuti</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Selama</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
    
                                                        <input class="form-control" type="number" name="lama_cuti" value="{{ old('lama_cuti') }}">
                                                    </div>
                                                    @error('lama_cuti')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group select-contain w-100">
                                                        <select class="select-contain-select" name="jenis_waktu">
                                                            <option value="hari">hari</option>
                                                            <option value="minggu">minggu</option>
                                                            <option value="bulan">bulan</option>
                                                            <option value="tahun">tahun</option>
                                                        </select>
                                                    </div>
                                                    @error('jenis_waktu')
                                                    <div style="margin-top: -16px">
                                                        <small class="text-danger">{{ $message }}</small>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Cuti</label>
                                            <div class="form-group d-flex align-items-center">
                                                <input class="form-control pl-3" type="date" name="mulai_tanggal" placeholder="Tanggal Mulai" required>
                                                <span class="px-2">s/d</span>
                                                <input class="form-control pl-3" type="date" name="akhir_tanggal" placeholder="Tanggal Akhir" required>
                                            </div>
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
                                                <input class="form-control" type="text" name="cuti_n_2" placeholder="Masukkan N-2" value="{{ $pegawai->cuti_n_2 }}" readonly>
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
                                                <input class="form-control" type="text" name="keterangan_n_2" placeholder="Masukkan Keterangan N-2" value="{{ $pegawai->keterangan_n_2 }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_n_1" placeholder="Masukkan N-1" value="{{ $pegawai->cuti_n_1 }}" readonly>
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
                                                <input class="form-control" type="text" name="keterangan_n_1" placeholder="Masukkan Keterangan N-1" value="{{ $pegawai->keterangan_n_1 }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_n" placeholder="Masukkan N" value="{{ $pegawai->cuti_n }}" readonly>
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
                                                <input class="form-control" type="text" name="keterangan_n" placeholder="Masukkan Keterangan N" value="{{ $pegawai->keterangan_n }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_besar" placeholder="Masukkan Cuti Besar" value="{{ $pegawai->cuti_besar }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_sakit" placeholder="Masukkan Cuti Sakit" value="{{ $pegawai->cuti_sakit }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_melahirkan" placeholder="Masukkan Cuti Melahirkan" value="{{ $pegawai->cuti_melahirkan }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_karena_alasan_penting" placeholder="Masukkan Cuti Karena Alasan Penting" value="{{ $pegawai->cuti_karena_alasan_penting }}" readonly>
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
                                                <input class="form-control" type="text" name="cuti_diluar_tanggungan_negara" placeholder="Masukkan Cuti Di Luar Tanggungan Negara" value="{{ $pegawai->cuti_diluar_tanggungan_negara }}" readonly>
                                            </div>
                                            @error('cuti_diluar_tanggungan_negara')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text"><strong>Alamat Selama Menjalankan Cuti</strong></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="alamat_selama_cuti" placeholder="Masukkan Alamat Selama Menjalankan Cuti" value="{{ old('alamat_selama_cuti') }}">
                                            </div>
                                            @error('alamat_selama_cuti')
                                            <div style="margin-top: -16px">
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 text-center">
                                    <a href="/pengajuan-cuti" class="theme-btn theme-btn-small theme-btn-transparent">Kembali</a>
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