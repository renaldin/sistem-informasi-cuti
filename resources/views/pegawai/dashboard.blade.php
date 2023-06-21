@extends('layout.main')

@section('content')
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
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Perihal</th>
                                        <th scope="col">Tanggal Upload</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataSurat as $item)
                                    @if ($item->id_user == $user->id_user && $item->status_surat == 'Sudah Dikirim') 
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->no_surat }}</td>
                                        <td>{{ $item->perihal_surat }}</td>
                                        <td>{{ $item->tanggal_upload }}</td>
                                        <td><span class="badge badge-primary py-1 px-2">{{ $item->status_terlaksana }} Terlaksana</span></td>
                                    </tr>
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
@endsection
