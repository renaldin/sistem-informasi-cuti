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
                            <h2 class="sec__title text-white">Detail Edaran</h2>
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
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="listing-header pb-4">
                    <p class="font-size-14">Tanggal Publikasi: {{$detail->tanggal_upload}}</p>
                </div>
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title font-size-28 pb-2">{{$detail->judul}}</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content contact-form-action">
                        <p>{{$detail->deskripsi}}</p>
                    </div><!-- end form-content -->
                    <div class="form-content">
                        <div class="input-box">
                            <label class="label-text"><strong>Dokumen:</strong></label>
                            <div class="form-group">
                                <iframe src="{{ asset('file_artikel/'.$detail->dokumen) }}" width="100%" height="400px" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-9 -->
        </div><!-- end row -->
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