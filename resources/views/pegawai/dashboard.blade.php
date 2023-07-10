@extends('layout.main')

@section('content')

@php
    date_default_timezone_set('Asia/Jakarta');
@endphp

<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-12 ">
                <div class="icon-box icon-layout-2 dashboard-icon-box pb-3">
                    <div class="d-flex pb-3 justify-content-between">
                        <div class="info-content">
                            <p class="info__desc">Selamat datang {{$user->nama}}. Selamat datang di website {{$biodata->nama_website}}.</p>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
        </div>
        <div class="row mt-2">
            <div class="col-lg-3 responsive-column-l">
                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                    <div class="d-flex pb-3 justify-content-between">
                        <div class="info-content">
                            <p class="info__desc">Total Pengajuan Cuti</p>
                            <h4 class="info__title">{{$jumlahPengajuanCuti}}</h4>
                        </div><!-- end info-content -->
                        <div class="info-icon icon-element bg-4">
                            <i class="la la-bookmark-o"></i>
                        </div><!-- end info-icon-->
                    </div>
                    <div class="section-block"></div>
                    <a href="/pengajuan-cuti" class="d-flex align-items-center justify-content-between view-all">Lihat Semua <i class="la la-angle-right"></i></a>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-l">
                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                    <div class="d-flex pb-3 justify-content-between">
                        <div class="info-content">
                            <p class="info__desc">Selesai Pengajuan Cuti</p>
                            <h4 class="info__title">{{$selesaiPengajuanCuti}}</h4>
                        </div><!-- end info-content -->
                        <div class="info-icon icon-element bg-3">
                            <i class="la la-star"></i>
                        </div><!-- end info-icon-->
                    </div>
                    <div class="section-block"></div>
                    <a href="/riwayat-pengajuan-cuti" class="d-flex align-items-center justify-content-between view-all">Lihat Semua <i class="la la-angle-right"></i></a>
                </div>
            </div><!-- end col-lg-3 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div>
                            <h3 class="title">Riwayat Surat Tugas</h3>
                        </div>
                    </div>
                    <div class="form-title-wrap">
                        <div>
                            <table>
                                <tr>
                                    <td colspan="3">Keterangan Tanggal:</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-danger py-1 px-2">Merah</span></td>
                                    <td width="5px"></td>
                                    <td>Berjarak kurang dari 30 menit</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Perihal</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @php
                                    date_default_timezone_set('Asia/Jakarta');
                                        function reminder($tanggal) {
                                            // Mendapatkan waktu sekarang
                                            $currentDateTime = date('Y-m-d H:i:s');

                                            // Mengubah string waktu menjadi waktu dalam detik
                                            $timestamp = strtotime($currentDateTime);
                                            $tanggal_surat = strtotime($tanggal);

                                            $sekarang = floor($timestamp / 60);
                                            $waktu_surat = floor($tanggal_surat / 60);
                                            
                                            // Menghitung selisih waktu antara jam tertentu dengan jam sekarang
                                            $selisih = $waktu_surat - $sekarang;
                                            return $selisih;
                                        }
                                    @endphp
                                    @foreach ($dataSurat as $item)
                                    @if ($item->id_user == $user->id_user && $item->status_surat == 'Sudah Dikirim') 
                                        @if ($item->tanggal >= date('Y-m-d H:i:s'))
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $item->no_surat }}</td>
                                                <td>{{ $item->perihal_surat }}</td>
                                                <td>
                                                    @if (reminder($item->tanggal) >= 1440)
                                                        <span class="badge badge-success py-1 px-2">
                                                            {{ $item->tanggal }}
                                                        </span>
                                                    @elseif(reminder($item->tanggal) >= 30)
                                                        <span class="badge badge-warning py-1 px-2">
                                                            {{ $item->tanggal }}
                                                        </span>
                                                    @elseif(reminder($item->tanggal) >= 0)
                                                        <span class="badge badge-danger py-1 px-2">
                                                            {{ $item->tanggal }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-primary py-1 px-2">
                                                            {{ $item->tanggal }}
                                                        </span>
                                                    @endif    
                                                </td>
                                                <td>{{ $item->status_terlaksana }} Terlaksana</td>
                                                <td>
                                                    <div class="table-content">
                                                        <button type="button" class="theme-btn theme-btn-small mb-1" data-toggle="modal" data-target="#detail{{$item->id_surat}}" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
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

{{-- Modal Detail --}}
@foreach ($dataSurat as $item)
<div class="modal fade" id="detail{{$item->id_surat}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <table>
                        <tr>
                            <th width="150px">No. Surat</th>
                            <td width="20px" class="text-center">:</td>
                            <td>{{$item->no_surat}}</td>
                        </tr>
                        <tr>
                            <th>Perihal</th>
                            <td>:</td>
                            <td>{{$item->perihal_surat}}</td>
                        </tr>
                        <tr>
                            <th>Hari</th>
                            <td>:</td>
                            <td>{{$item->hari}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Surat</th>
                            <td>:</td>
                            <td>{{$item->tanggal}}</td>
                        </tr>
                        <tr>
                            <th>Tempat</th>
                            <td>:</td>
                            <td>{{$item->tempat}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Surat</th>
                            <td>:</td>
                            <td>{{$item->jenis_surat}}</td>
                        </tr>
                        <tr>
                            <th>Status Surat</th>
                            <td>:</td>
                            <td>{{$item->status_terlaksana}} Terlaksana</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-12 mt-3 text-center">
                    <label class="label-text">File Surat</label>
                    <iframe src="{{ asset('file_surat/'.$item->file_surat) }}" frameborder="0" scrolling="auto" width="100%" height="500px"></iframe>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- Ttup --}}
@endsection
