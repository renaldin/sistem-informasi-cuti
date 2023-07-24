@extends('layoutLanding.main')

@section('content')


<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper hero-wrapper7">
    <div class="hero-box hero-bg-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-content mt-0">
                        <div class="section-heading">
                            <h2 class="sec__title">Sistem Informasi Kepegawaian <br> Polietknik Negeri Subang</h2>
                            <p class="sec__desc pt-3 font-size-18">Aktivitas kepegawaian bisa dilakukan dengan cepat</p>
                        </div>
                    </div><!-- end hero-content -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="mt-5">
                        <div class="search-fields-container-inner text-center">
                            <img src="{{ asset('foto_biodata/'.$biodata->logo) }}" alt="hotel-img" style="width: 70%; opacity: 0.8; margin-top: -40px;">
                        </div>
                    </div>
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <polygon points="100 10 100 0 0 10"></polygon>
        </svg>
    </div>
</section><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-50px padding-bottom-50px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                        <i class="la la-bullhorn"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Menyediakan Informasi</h4>
                        <p class="info__desc">
                         Menyediakan informasi tentang kepagawaian di Politeknik Negeri Subang yang terupdate.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box margin-top-50px">
                    <div class="info-icon">
                       <i class="la la-globe"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Pengajuan Cuti</h4>
                        <p class="info__desc">
                         Dapat melakukan pengajuan cuti dengan cepat dan terarah.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4">
                <div class="icon-box">
                    <div class="info-icon">
                       <i class="la la-thumbs-up"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Mengelola Surat Tugas</h4>
                        <p class="info__desc">
                         Dapat melakukan pengelolaan dan pengiriman surat tugas dengan cepat.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START ABOUT AREA
================================= -->
<section class="about-area section--padding overflow-hidden" id="tentang">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content pr-5">
                    <div class="section-heading">
                        <h4 class="font-size-16 pb-2">Tentang Website</h4>
                        <h2 class="sec__title">Sistem Informasi Kepegawaian</h2>
                        <p class="sec__desc pt-4 pb-2">Sistem informasi kepegawaian adalah sistem informasi berbasis website yang dapat melakukan beberapa aktivitas yang dapat dilakukan di kepegawaian Politeknik Negeri Subang.</p>
                        <p class="sec__desc">Sistem ini dapat melakukan pengajuan cuti, menyediakan informasi tentang kepegawaian, mengelola absensi, dan mengelola surat tugas serta mengirimkan surat tugas.</p>
                    </div>
                </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="image-box about-img-box">
                    <img src="{{ asset('gambar/profil.jpg') }}" alt="about-img" class="img__item img__item-1">
                    <img src="{{ asset('gambar/logo.png') }}" alt="about-img" class="img__item img__item-2">
                </div>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- ================================
    END ABOUT AREA
================================= -->

<!-- ================================
    START DESTINATION AREA
================================= -->
<section class="destination-area section--padding" id="edaran">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Artikel</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="full-width-slider carousel-action">
                        @foreach ($dataArtikel as $item)
                        @if ($item->status == 'Aktif')
                            <div class="card-item mb-0">
                                <div class="card-img">
                                    <a href="/detail-edaran/{{$item->id_artikel}}" class="d-block">
                                        <center>
                                            <img src="{{ asset('foto_artikel/'.$item->gambar) }}" alt="{{$item->judul}}" style="width: 200px;">
                                        </center>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a href="hotel-single.html">{{$item->judul}}</a></h3>
                                    <p class="card-meta">Tanggal Publikasi: {{$item->tanggal_upload}}</p>
                                    <div class="card-price mt-3 d-flex align-items-right justify-content-right">
                                        <a href="/detail-edaran/{{$item->id_artikel}}" class="btn-text">Buka<i class="la la-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif 
                        @endforeach
                    </div>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section><!-- end destination-area -->
<!-- ================================
    END DESTINATION AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area padding-top-100px padding-bottom-180px text-center" id="web">
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