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
                            <p class="font-size-14">Silahkan kelola data artikel di tabel bawah!</p>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <a href="/tambah-artikel" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>  
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
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal Upload</th>
                                        <th scope="col">Dokumen</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($dataArtikel as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->tanggal_upload }}</td>
                                        <td>
                                            @if ($item->dokumen === null)
                                                Tidak Ada
                                            @else
                                                <button type="button" data-toggle="modal" data-target="#dokumen{{$item->id_artikel}}" class="theme-btn theme-btn-small">Dokumen</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="table-content">
                                                <a href="/detail-artikel/{{$item->id_artikel}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                <a href="/edit-artikel/{{$item->id_artikel}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>   
                                                <button type="button" data-toggle="modal" data-target="#hapus{{$item->id_artikel}}" class="theme-btn theme-btn-small mb-1" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="la la-trash"></i></button>   
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


{{-- Modal Hapus --}}
@foreach ($dataArtikel as $item)
<div class="modal fade" id="hapus{{$item->id_artikel}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah Anda yakin akan hapus artikel <strong>{{$item->judul}}</strong> ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <a href="/hapus-artikel/{{$item->id_artikel}}" class="btn btn-danger">Hapus</a>
        </div>
        </form>
        </div>
    </div>
</div>
@endforeach
{{-- Ttup --}}

{{-- Modal Hapus --}}
@foreach ($dataArtikel as $item)
<div class="modal fade" id="dokumen{{$item->id_artikel}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-lg">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Dokumen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <iframe src="{{ asset('file_artikel/'.$item->dokumen) }}" width="100%" height="400px" frameborder="0"></iframe>
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