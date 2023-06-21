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
                            <p class="font-size-14">Silahkan lihat data surat di tabel bawah!</p>
                        </div>
                    </div>
                    {{-- <div class="form-title-wrap">
                        <div>
                            <table>
                                <tr>
                                    <td colspan="3">Keterangan Tanggal:</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-success py-1 px-2">Hijau</span></td>
                                    <td width="5px"></td>
                                    <td>Berjarak Lebih dari 24 jam</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-warning py-1 px-2">Kuning</span></td>
                                    <td width="5px"></td>
                                    <td>Berjarak Lebih dari 30 menit</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-danger py-1 px-2">Merah</span></td>
                                    <td width="5px"></td>
                                    <td>Berjarak kurang dari 30 menit <strong>(Segera klik tombol reminder)</strong></td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-primary py-1 px-2">Biru</span></td>
                                    <td width="5px"></td>
                                    <td>Sudah Selesai</td>
                                </tr>
                            </table>
                            
                        </div>
                    </div> --}}
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            {{-- <div class="row mb-2">
                                <div class="col-lg-12">
                                    <a href="/tambah-surat" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>
                                    <button type="button" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#cetak"><i class="la la-print"></i> Cetak</button>
                                </div>
                            </div> --}}
                            {{-- <div class="mb-2">
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
                            </div> --}}
                            <table class="table" id="example3">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Perihal Surat</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataSurat as $item)
                                    @if ($item->nip == $user->nip)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->perihal_surat }}</td>
                                        <td>{{ $item->status_surat  }}</td>
                                        <td>{{ $item->tanggal }}</td>
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