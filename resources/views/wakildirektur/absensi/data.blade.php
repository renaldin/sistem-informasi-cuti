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
                            {{-- <div class="row mb-2">
                                <div class="col-lg-6">
                                    <form action="/absensi_tanggal" method="POST">
                                        @csrf
                                        <div class="input-box">
                                            <label class="label-text">Tanggal Mulai</label>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="tanggal_mulai" placeholder="Masukkan Tanggal" required>
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <label class="label-text">Sampai Dengan</label>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="tanggal_akhir" placeholder="Masukkan Tanggal" required>
                                            </div>
                                        </div>
                                        <div class="input-box">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>    
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div> --}}
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <p class="font-size-14">Filter:</p>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#tanggal"><i class="la la-calendar"></i> Tanggal</button>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#bulan"><i class="la la-calendar"></i> Bulan</button>
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
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataAbsensi as $item)
                                    @if ($item->nip == $user->nip)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->masuk }}</td>
                                            <td>{{ $item->pulang }}</td>
                                            @if ($item->keterangan == null)
                                                <td>Tidak Ada</td>
                                            @else
                                                <td>{{ $item->keterangan }}</td>
                                            @endif
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#edit{{$item->id_absensi}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></button>  
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

{{-- Modal Tanggal --}}
<div class="modal fade" id="tanggal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tanggal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="/filter-lihat-absensi" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Dari tanggal</label>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggal_mulai" placeholder="Masukkan Tanggal" required>
                                    <input class="form-control" type="hidden" name="filter" value="Tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Sampai Dengan</label>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggal_akhir" placeholder="Masukkan Tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
        </form>
        </div>
    </div>
</div>
{{-- Tutup --}}
{{-- Modal Bulan --}}
<div class="modal fade" id="bulan"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bulan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="/filter-lihat-absensi" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Bulan</label>
                                <div class="form-group select-contain w-100">
                                    <input class="form-control" type="hidden" name="filter" value="Bulan">
                                    <select class="select-contain-select" name="bulan" id="bulan" required>
                                        <option value="">-- Pilih Bulan --</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box">
                                <label class="label-text">Tahun</label>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="tahun" min="2000" max="2099" step="1" value="{{date('Y')}}" placeholder="Masukkan Tahun" required>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Filter</button>
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
            <div class="row">
                <div class="col-lg-12">
                    <form action="/edit-alasan/{{$item->id_absensi}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-box">
                            <label class="label-text">Alasan Tidak Masuk</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="alasan" @if($item->alasan)value="{{$item->alasan}}"@endif placeholder="Masukkan Alasan" required>
                            </div>
                        </div>
                        <div class="input-box">
                            <label class="label-text">File</label>
                            <div class="form-group">
                                <input class="form-control" type="file" name="file_absensi">
                            </div>
                        </div>
                </div>
                <br>
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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- Tutup --}}

@endsection