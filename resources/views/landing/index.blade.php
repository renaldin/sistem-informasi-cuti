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
                    <div class="search-fields-container search-fields-container-shape">
                        <div class="search-fields-container-inner">
                            <img src="{{ asset('foto_biodata/'.$biodata->logo) }}" alt="hotel-img" style="width: 100%;">
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
<section class="about-area section--padding overflow-hidden">
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
<section class="destination-area section--padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Most Popular</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    
                    <div class="full-width-slider carousel-action">
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/3" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 2">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 2 (Ukuran 2)</a></h3>
                                <p class="card-meta">Jalan Contoh 2 No. 2, RT 2 RW 2, Kelurahan 2, Kecamatan 2, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/3" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/4" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 3">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 3 (Ukuran 3)</a></h3>
                                <p class="card-meta">Jalan Contoh 3 No. 3, RT 3 RW 3, Kelurahan 3, Kecamatan 3, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/4" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/5" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 4">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 4 (Ukuran 4)</a></h3>
                                <p class="card-meta">Jalan Contoh 4 No. 4, RT 4 RW 4, Kelurahan 4, Kecamatan 4, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/5" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/6" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 5">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 5 (Ukuran 5)</a></h3>
                                <p class="card-meta">Jalan Contoh 5 No. 5, RT 5 RW 5, Kelurahan 5, Kecamatan 5, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/6" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/7" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 6">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 6 (Ukuran 6)</a></h3>
                                <p class="card-meta">Jalan Contoh 6 No. 6, RT 6 RW 6, Kelurahan 6, Kecamatan 6, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/7" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/8" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 7">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 7 (Ukuran 7)</a></h3>
                                <p class="card-meta">Jalan Contoh 7 No. 7, RT 7 RW 7, Kelurahan 7, Kecamatan 7, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/8" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/9" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 8">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 8 (Ukuran 8)</a></h3>
                                <p class="card-meta">Jalan Contoh 8 No. 8, RT 8 RW 8, Kelurahan 8, Kecamatan 8, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/9" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/11" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 10">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 10 (Ukuran 10)</a></h3>
                                <p class="card-meta">Jalan Contoh 10 No. 10, RT 10 RW 10, Kelurahan 10, Kecamatan 10, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/11" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/12" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 11">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 11 (Ukuran 11)</a></h3>
                                <p class="card-meta">Jalan Contoh 11 No. 11, RT 11 RW 11, Kelurahan 11, Kecamatan 10, Kab. Bandung, Jawa Barat, 60256</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/12" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/13" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 15">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 15 (Ukuran 15)</a></h3>
                                <p class="card-meta">Bandung</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/13" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/14" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 16">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 16 (Ukuran 16)</a></h3>
                                <p class="card-meta">Bandung</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/14" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                                <div class="card-item mb-0">
                            <div class="card-img">
                                <a href="/reklame/15" class="d-block">
                                    <img src="{{ asset('template/images/img1.jpg') }}" alt="Reklame Billboard Lokasi 18">
                                </a>
                                <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <i class="la la-heart-o"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><a href="hotel-single.html">Lokasi 18 (Ukuran 18)</a></h3>
                                <p class="card-meta">Subang</p>
                                <div class="card-price mt-3 d-flex align-items-center justify-content-between">
                                    <p>
                                                                                    <span class="price__from">Harga?</span>
                                            <span class="price__from">Booking Dulu!</span>
                                                                            </p>
                                    <a href="/reklame/15" class="btn-text">Booking<i class="la la-angle-right"></i></a>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                                            </div><!-- end hotel-card-carousel -->
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