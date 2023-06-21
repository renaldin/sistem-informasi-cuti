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
                            <p class="font-size-14">Silahkan lihat riwayat data pengajuan cuti di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="mb-2">
                                @if (session('berhasil'))
                                <div class="alert bg-primary text-white alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                    {{ session('berhasil') }}
                                </div>
                                @endif
                                @if (session('gagal'))
                                <div class="alert bg-danger text-white alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                                    {{ session('gagal') }}
                                </div>
                                @endif
                            </div>
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Cuti</th>
                                        <th scope="col">Dari Atasan</th>
                                        <th scope="col">Dari Pejabat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($dataPengajuanCuti as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jenis_cuti }}</td>
                                        <td>{{ $item->pertimbangan_ketua_jurusan }}</td>
                                        <td>{{ $item->keputusan_wakil_direktur }}</td>
                                        <td>
                                            <div class="table-content">
                                                <a href="@if($user->role == 'Pegawai')/detail-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/detail-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                <a href="@if($user->role == 'Pegawai')/download-riwayat-pengajuan-cuti/{{ $item->id_pengajuan_cuti }}@elseif($user->role == 'Ketua Jurusan')/download-riwayat-pengajuan-cuti-ketua-jurusan/{{ $item->id_pengajuan_cuti }}@endif" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="la la-download"></i></a>
                                            </div>
                                        </td>
                                    </tr>
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