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
                            <table class="table" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Pulang</th>
                                        <th scope="col">Keterangan</th>
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

@endsection