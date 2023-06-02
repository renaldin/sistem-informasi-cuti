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
                            <p class="font-size-14">Silahkan kelola data absensi di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#tambah"><i class="la la-plus"></i> Tambah</button>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#import"><i class="la la-plus"></i> Import</button>
                                </div>
                            </div>
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
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataAbsensi as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ date('d F Y H:i:s', strtotime($item->masuk)) }}</td>
                                        <td>{{ date('d F Y H:i:s', strtotime($item->pulang)) }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <div class="table-content">
                                                <button type="button" data-toggle="modal" data-target="#detail{{$item->id_absensi}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></button>
                                                <button type="button" data-toggle="modal" data-target="#edit{{$item->id_absensi}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></button>   
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

{{-- Modal Import --}}
<div class="modal fade" id="import"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="/import-absensi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box">
                        <label class="label-text">File Excel</label>
                        <div class="form-group">
                            <input class="form-control" type="file" name="file" placeholder="Masukkan File Excel" required>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Tutup --}}

{{-- Modal Tambah --}}
<div class="modal fade" id="tambah"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="/tambah-absensi" method="POST">
                    @csrf
                    <div class="input-box">
                        <label class="label-text">Nama Lengkap</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal Masuk</label>
                        <div class="form-group">
                            <input class="form-control" type="datetime-local" name="masuk" placeholder="Masukkan Tanggal Masuk" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal Pulang</label>
                        <div class="form-group">
                            <input class="form-control" type="datetime-local" name="pulang" placeholder="Masukkan Tanggal Masuk">
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Keterangan</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan" required>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Tutup --}}

{{-- Modal Edit --}}
@foreach ($dataAbsensi as $item)
<div class="modal fade" id="edit{{$item->id_absensi}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="/edit-absensi/{{$item->id_absensi}}" method="POST">
                    @csrf
                    <div class="input-box">
                        <label class="label-text">Nama Lengkap</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" value="{{$item->nama}}" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal" value="{{$item->tanggal}}" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal Masuk</label>
                        <div class="form-group">
                            <input class="form-control" type="datetime-local" name="masuk" placeholder="Masukkan Tanggal Masuk" value="{{$item->masuk}}" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Tanggal Pulang</label>
                        <div class="form-group">
                            <input class="form-control" type="datetime-local" name="pulang" placeholder="Masukkan Tanggal Masuk" value="{{$item->pulang}}">
                        </div>
                    </div>
                    <div class="input-box">
                        <label class="label-text">Keterangan</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan" value="{{$item->keterangan}}" required>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- Tutup --}}

{{-- Modal Detail --}}
@foreach ($dataAbsensi as $item)
<div class="modal fade" id="detail{{$item->id_absensi}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                            <th width="150px">Nama</th>
                            <td width="20px" class="text-center">:</td>
                            <td>{{$item->nama}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Absensi</th>
                            <td>:</td>
                            <td>{{date('d F Y', strtotime($item->tanggal))}}</td>
                        </tr>
                        <tr>
                            <th>Masuk</th>
                            <td>:</td>
                            <td>{{date('d F Y H:i:s', strtotime($item->masuk))}}</td>
                        </tr>
                        <tr>
                            <th>Pulang</th>
                            <td>:</td>
                            <td>{{date('d F Y H:i:s', strtotime($item->pulang))}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{$item->keterangan}}</td>
                        </tr>
                    </table>
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