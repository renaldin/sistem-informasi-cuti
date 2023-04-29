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
        <div class="row mt-2 mb-5">
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
        <br>
        {{-- footer --}}
        @include('layout.footer')
        {{-- end footer --}}
    </div>
</div>
@endsection
