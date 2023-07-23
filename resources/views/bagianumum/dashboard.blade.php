@extends('layout.main')

@section('content')
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

$jumlahReminder = 0;
foreach($surat as $item){
    if(reminder($item->tanggal) <= 30 && reminder($item->tanggal) >= 0){
        $jumlahReminder = $jumlahReminder + 1;
    }
}
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
        <div class="row mt-4">
            <div class="col-lg-3 responsive-column-l">
                <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                    <div class="d-flex pb-3 justify-content-between">
                        <div class="info-content">
                            <p class="info__desc">Reminder Surat</p>
                            <h4 class="info__title">Butuh reminder ada {{$jumlahReminder}} surat</h4>
                        </div><!-- end info-content -->
                        <div class="info-icon icon-element bg-1">
                            <i class="la la-users"></i>
                        </div><!-- end info-icon-->
                    </div>
                    <div class="section-block"></div>
                    <a href="/kelola-surat"  class="d-flex align-items-center justify-content-between view-all">Lihat <i class="la la-angle-right"></i></a>
                    {{-- <a href="/kelola-surat" data-toggle="modal" data-target="#reminder"  class="d-flex align-items-center justify-content-between view-all">Lihat <i class="la la-angle-right"></i></a> --}}
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        {{-- footer --}}
        @include('layout.footer')
        {{-- end footer --}}
    </div>
</div>
@endsection
