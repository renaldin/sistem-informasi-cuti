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
                            <p class="font-size-14">Silahkan kelola data surat di tabel bawah!</p>
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
                                    <td>Berjarak kurang dari 30 menit <strong>(Segera klik tombol reminder)</strong></td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <a href="/tambah-surat" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#cetak"><i class="la la-print"></i> Cetak</button>
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
                            <table class="table" id="example3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Penerima</th>
                                        <th scope="col">Perihal Surat</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal</th>
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
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#pegawai{{$item->id_surat}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Kirim">Lihat</button>
                                        </td>
                                        {{-- <td>{{ $item->nama }}</td> --}}
                                        <td>{{ $item->perihal_surat }}</td>
                                        <td>{{ $item->status_terlaksana  }}</td>
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
                                        <td>
                                            <div class="table-content">
                                                @if ($item->status_surat === 'Sudah Dikirim')
                                                    <button type="button" data-toggle="modal" data-target="#reminder{{$item->id_surat}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Reminder ke WA"><i class="la la-send"></i></button>
                                                    <a href="/edit-surat/{{ $item->id_surat }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                    <a href="/detail-surat/{{ $item->id_surat }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#hapus{{$item->id_surat}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>
                                                @else
                                                    <a href="/edit-surat/{{ $item->id_surat }}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                    {{-- <button type="button" data-toggle="modal" data-target="#kirim{{$item->id_surat}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Kirim Surat"><i class="la la-check"></i></button> --}}
                                                @endif
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

{{-- Pegawai --}}
@foreach ($dataSurat as $item)
<div class="modal fade" id="pegawai{{ $item->id_surat }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Penerima</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                {{-- <div class="row">
                    <div class="col-lg-12"> --}}
                    <div class="form-box">
                        <div class="form-content">
                            <div class="table-form table-responsive">
                                <table class="table" id="example2">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Penerima</th>
                                            <th scope="col">Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1;
                                        @endphp
                                        @foreach ($dataDetailSurat as $row)
                                        @if ($item->id_surat == $row->id_surat)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->nama}}</td>
                                            <td>{{$row->jabatan}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- </div>
                </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
           
        </div>
        </div>
    </div>
</div>
@endforeach

{{-- Hapus --}}
@foreach ($dataSurat as $item)
<div class="modal fade" id="hapus{{ $item->id_surat }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan hapus data ini ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/hapus-surat/{{ $item->id_surat }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($dataSurat as $item)
<div class="modal fade" id="reminder{{ $item->id_surat }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reminder ke Whatsapp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan memberikan reminder?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/reminder-surat/{{$item->id_surat}}" class="btn btn-primary">Reminder</a>
        </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($dataSurat as $item)
<div class="modal fade" id="kirim{{ $item->id_surat }}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kirim Surat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan kirim surat ini?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/kirim-surat/{{ $item->id_surat }}" class="btn btn-primary">Kirim</a>
        </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-sm">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rentang Tanggal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/cetak-surat" method="POST">
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
          <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
      </form>
      </div>
    </div>
</div>
@endsection