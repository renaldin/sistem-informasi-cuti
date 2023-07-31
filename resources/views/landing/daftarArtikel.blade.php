@extends('layoutLanding.main')

@section('content')


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-8">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Daftar Artikel</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START FORM AREA
================================= -->
<section class="listing-form section--padding">
    <div class="container">
        <div class="row margin-bottom-30px">
            <div class="col-lg-12">
                <!-- ================================
                    START CTA AREA
                ================================= -->
                <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="section-heading">
                                    @if($keyword !== NULL)<h4 class="sec__title font-size-20 text-white"> Hasil pencarian: {{$keyword}}</h4>@endif
                                </div><!-- end section-heading -->
                            </div><!-- end col-lg-7 -->
                            <div class="col-lg-5">
                                <div class="subscriber-box">
                                    <div class="contact-form-action">
                                        <form action="/daftar-artikel" method="POST">
                                            @csrf
                                            <div class="input-box">
                                                <div class="form-group mb-0">
                                                    <input class="form-control" type="text" name="keyword" placeholder="Masukkan Keyword" @if($keyword !== NULL)value="{{$keyword}}"@endif>
                                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Cari</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end section-heading -->
                            </div><!-- end col-lg-5 -->
                        </div><!-- end row -->
                    </div><!-- end container -->
                </section><!-- end cta-area -->
                <!-- ================================
                    END CTA AREA
                ================================= -->

            </div>
        </div><!-- end filter-bar -->

        <div class="row">
            @foreach ($artikel as $item)
            @if($item->status === 'Aktif')
            <div class="col-lg-4 responsive-column">
                <div class="card-item ">
                    <div class="card-img">
                        <a href="/detail-edaran/{{$item->id_artikel}}" class="d-block">
                            <img src="{{ asset('foto_artikel/'.$item->gambar) }}" alt="{{ $item->judul }}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="/detail-edaran/{{$item->id_artikel}}">{{ $item->judul }}</a></h3>
                        {{-- <p class="card-meta">Tanggal Publikasi {{ date('d F Y', strtotime($item->tanggal_upload)) }}</p> --}}
                        <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                            <a href="/detail-edaran/{{$item->id_artikel}}" class="btn-text">Lihat<i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            @endif
            @endforeach
        </div><!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                {{-- pagination --}}
                {{ $artikel->links('vendor.pagination.custom') }}
            </div>
        </div>

    </div><!-- end container -->
</section><!-- end listing-form -->
<!-- ================================
    END FORM AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area padding-top-100px padding-bottom-180px text-center">
    <div class="video-bg">
        <img src="{{ asset('gambar/gedung.jpg') }}" alt="Gedung">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title text-white line-height-55">Politeknik Negeri Subang</h2>
                </div><!-- end section-heading -->
                <div class="btn-box padding-top-35px">
                    <a href="www.polsub.ac.id" target="__blank" class="theme-btn border-0">Web Polsub</a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <svg class="cta-svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M-31.31,170.22 C164.50,33.05 334.36,-32.06 547.11,196.88 L500.00,150.00 L0.00,150.00 Z"></path></svg>
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->
    
@endsection