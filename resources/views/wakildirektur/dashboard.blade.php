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
                                        <th scope="col">Aksi</th>
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
                                        <td>
                                            <div class="table-content">
                                                <button type="button" class="theme-btn theme-btn-small mb-1" data-toggle="modal" data-target="#detail{{$item->id_surat}}" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></button>
                                            </div>
                                        </td>
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
