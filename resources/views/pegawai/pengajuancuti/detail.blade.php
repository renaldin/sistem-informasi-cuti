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
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="input-box">
                                        <h5><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 mt-3">
                                    <table style="width: 100%; border: #424141 1px solid;">
                                        <tr style="padding-left: 20px;">
                                            <th colspan="4" style="text-align: left; padding-left: 15px; border-left: 0;">I. DATA PEGAWAI</th>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Nama</td>
                                            <td width="350px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->nama}}</td>
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">NIP</td>
                                            <td width="350px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->nip}}</td>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Jabatan</td>
                                            <td width="350px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->jabatan}}</td>
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Masa Kerja</td>
                                            <td width="350px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->masa_kerja}}</td>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Unit Kerja</td>
                                            <td colspan="3" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->unit_kerja}} POLITEKNIK NEGERI SUBANG</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <table style="width: 100%; border: #424141 1px solid;">
                                        <tr style="padding-left: 20px;">
                                            <th colspan="4" style="text-align: left; padding-left: 15px; border-left: 0;">II. JENIS CUTI YANG DIAMBIL **</th>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">1. Cuti Tahunan</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti Tahunan') &#10004 @endif</td>
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">2. Cuti Besar</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti Besar') &#10004 @endif</td>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">3. Cuti Sakit</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti Sakit') &#10004 @endif</td>
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">4. Cuti Melahirkan</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti Melahirkan') &#10004 @endif</td>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">5. Cuti Karena Alasan Penting</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti Karena Alasan Penting') &#10004 @endif</td>
                                            <td width="430px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">6. Cuti di Luar Tanggungan Negara</td>
                                            <td width="250px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">@if($detail->jenis_cuti === 'Cuti di Luar Tanggungan Negara') &#10004 @endif</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <table style="width: 100%; border: #424141 1px solid;">
                                        <tr style="padding-left: 20px;">
                                            <th style="text-align: left; padding-left: 15px; border-left: 0;">III. ALASAN CUTIL</th>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->alasan_cuti}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <table style="width: 100%; border: #424141 1px solid;">
                                        <tr style="padding-left: 20px;">
                                            <th colspan="6" style="text-align: left; padding-left: 15px; border-left: 0;">IV. LAMANYA CUTI</th>
                                        </tr>
                                        <tr style="padding-left: 20px;">
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Selama</td>
                                            <td style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->lama_cuti}} (<span @if($detail->jenis_waktu !== 'hari') style="text-decoration: line-through;" @endif>hari</span>/<span @if($detail->jenis_waktu !== 'bulan') style="text-decoration: line-through;" @endif>bulan</span>/<span @if($detail->jenis_waktu !== 'tahun') style="text-decoration: line-through;" @endif>tahun</span>)*</td>
                                            <td width="130px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">Mulai Tanggal</td>
                                            <td style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->mulai_tanggal}}</td>
                                            <td width="50px" style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">s.d</td>
                                            <td style="text-align: left; padding-left: 15px;; border-top: 1px solid #424141; border-bottom: 1px solid #424141; border-left: 1px solid #424141;">{{$detail->akhir_tanggal}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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