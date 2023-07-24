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
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#absen"><i class="la la-plus"></i> Tambah</button>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#export"><i class="la la-download"></i> Export</button>
                                    {{-- <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#cetak"><i class="la la-print"></i> Cetak</button> --}}
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
                                        <td>{{ $item->masuk }}</td>
                                        <td>{{ $item->pulang }}</td>
                                        @if ($item->keterangan == null)
                                            <td>Tidak Ada</td>
                                        @else
                                            <td>{{ $item->keterangan }}</td>
                                        @endif
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

{{-- Modal Absen --}}
<div class="modal fade" id="absen"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <center>
                {{-- <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#tambah"><i class="la la-plus"></i> Tambah Satu</button> --}}
                <a href="/unduh-format-excel" class="theme-btn theme-btn-small"><i class="la la-download"></i> Template</a>
                <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#import"><i class="la la-plus"></i> Import</button>
            </center>
        </div>
        <div class="modal-footer">
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Tutup --}}

{{-- Modal Export --}}
<div class="modal fade" id="export"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Export</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <center>
                <button type="button" class="theme-btn theme-btn-small" data-dismiss="modal" data-toggle="modal" data-target="#pdf"><i class="la la-download"></i> PDF</button>
                <button type="button" class="theme-btn theme-btn-small" data-dismiss="modal" data-toggle="modal" data-target="#excel"><i class="la la-download"></i> Excel</button>
            </center>
        </div>
        <div class="modal-footer">
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Tutup --}}

<div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/cetak-pdf-absensi" method="POST">
            @csrf
            <div class="form-group">
              <label for="tanggal_mulai">Mulai Dari Tanggal</label>
              <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai" required>
              @error('tanggal_mulai')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_akhir">Sampai Dengan</label>
              <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" id="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" required>
              @error('tanggal_akhir')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Export</button>
        </div>
      </form>
      </div>
    </div>
</div>

<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/cetak-excel-absensi" method="POST">
            @csrf
            <div class="form-group">
              <label for="tanggal_mulai">Mulai Dari Tanggal</label>
              <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai" required>
              @error('tanggal_mulai')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_akhir">Sampai Dengan</label>
              <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" id="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" required>
              @error('tanggal_akhir')
                  <small class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Export</button>
        </div>
      </form>
      </div>
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
                        <label class="label-text">File Excel <small>File Format .xlsx/.xls</small></label>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Pegawai</label>
                                <div class="form-group select-contain w-100">
                                    <select class="select2 form-control" style="width: 100%" name="id_pegawai" required>
                                        <option value="">-- Pilih Pegawai --</option>
                                        @foreach ($dataPegawai as $item)
                                            <option value="{{$item->id_pegawai}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Tanggal</label>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggal" placeholder="Masukkan Tanggal" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Tanggal Masuk</label>
                                <div class="form-group">
                                    <input class="form-control" type="datetime-local" name="masuk" placeholder="Masukkan Tanggal Masuk" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Tanggal Pulang</label>
                                <div class="form-group">
                                    <input class="form-control" type="datetime-local" name="pulang" placeholder="Masukkan Tanggal Masuk">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Keterangan</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="keterangan" placeholder="Masukkan Keterangan" required>
                                </div>
                            </div>
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
                        <label class="label-text">NIP/NIK</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nip" placeholder="Masukkan NIP/NIK" value="{{$item->nip}}" required>
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
                            <th width="150px">NIP/NIK</th>
                            <td width="20px" class="text-center">:</td>
                            <td>{{$item->nip}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Absensi</th>
                            <td>:</td>
                            <td>{{$item->tanggal}}</td>
                        </tr>
                        <tr>
                            <th>Masuk</th>
                            <td>:</td>
                            <td>{{$item->masuk}}</td>
                        </tr>
                        <tr>
                            <th>Pulang</th>
                            <td>:</td>
                            <td>{{$item->pulang}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{$item->keterangan}}</td>
                        </tr>
                        @if ($item->alasan)
                        <tr>
                            <th>Alasan</th>
                            <td>:</td>
                            <td>{{$item->alasan}}</td>
                        </tr>
                            
                        @endif
                    </table>
                </div>
                @if ($item->file_absensi)
                    <div class="col-lg-12 mt-3 text-center">
                        <label class="label-text">File Surat</label>
                        <iframe src="{{ asset('file_absensi/'.$item->file_absensi) }}" frameborder="0" scrolling="auto" width="100%" height="500px"></iframe>
                    </div>
                @endif
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