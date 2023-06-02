
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if ($subTitle) {{$biodata->nama_website}} | {{$subTitle}} @else {{$biodata->nama_website}} @endif</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('foto_biodata/'.$biodata->logo) }}">

    <!-- Google Fonts -->
    <link href="{{ asset('template/../../../../../../fonts.googleapis.com/css2bff7.css?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap') }}" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="section-bg">

{{-- Loading --}}
<div class="preloader" id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
{{-- End Loading --}}

<div class="user-canvas-container">
    <div class="side-menu-close">
        <i class="la la-times"></i>
    </div>
    <div class="user-canvas-nav-content">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                <div class="user-action-wrap user-sidebar-panel">
                    <div class="notification-item">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <span class="font-size-14 font-weight-bold">{{ $user->nama }}</span>
                            </div>
                        </a>
                        <div class="list-group drop-reveal-list user-drop-reveal-list">
                            <a href="/profil-admin" class="list-group-item list-group-item-action">
                                <div class="msg-body">
                                    <div class="msg-content">
                                        <h3 class="title"><i class="la la-user mr-2"></i>Profil</h3>
                                    </div>
                                </div><!-- end msg-body -->
                            </a>
                            {{-- <a href="/kelola-order" class="list-group-item list-group-item-action">
                                <div class="msg-body">
                                    <div class="msg-content">
                                        <h3 class="title"><i class="la la-shopping-cart mr-2"></i>Orders</h3>
                                    </div>
                                </div><!-- end msg-body -->
                            </a> --}}
                            <div class="section-block"></div>
                            <a href="/logout" class="list-group-item list-group-item-action">
                                <div class="msg-body">
                                    <div class="msg-content">
                                        <h3 class="title"><i class="la la-power-off mr-2"></i>Logout</h3>
                                    </div>
                                </div><!-- end msg-body -->
                            </a>
                        </div>
                    </div><!-- end notification-item -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Sidebar --}}
@include('layout.sidebar')
{{-- End Sidebar --}}

<section class="dashboard-area">
    <div class="dashboard-nav dashboard--nav">
        <div class="container-fluid">

            {{-- Header --}}
            @include('layout.header')
            {{-- End Header --}}
            
        </div>
    </div>

    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">

                {{-- Breadcrumb --}}
                @include('layout.breadcrumb')
                {{-- End Breadcrumb --}}

            </div>
        </div>
        

                {{-- Content --}}
                @yield('content')
                {{-- End Content --}}

                {{-- Footer --}}
                {{-- @include('layoutAdmin.footer') --}}
                {{-- End Footer --}}

            
    </div>
</section>

<div class="modal fade" id="logout"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Apakah Anda yakin akan logout ?</p>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
        </div>
    </div>
</div>

<!-- start scroll top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- Template JS Files -->
<script src="{{ asset('template/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('template/js/jquery-ui.js') }}"></script>
<script src="{{ asset('template/js/popper.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('template/js/moment.min.js') }}"></script>
<script src="{{ asset('template/js/daterangepicker.js') }}"></script>
<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('template/js/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('template/js/animated-headline.js') }}"></script>
<script src="{{ asset('template/js/jquery.ripples-min.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

<!-- Datatbles -->
<script src="{{ asset('template/datatables/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/datatables/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/datatables/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/datatables/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/datatables/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>

{{-- perizinan --}}
<script>
    $(function() {
        $("#pertimbangan_atasan").on("change", function() {
            var pertimbangan_atasan = $(this).val();
            if (pertimbangan_atasan != 'DISETUJUI') {
                $('#alasan_izin_cuti').closest('#alasan_izin_cuti').remove();
                $(".alasan_pertimbangan_atasan").append('<div class="input-box" id="alasan_izin_cuti">\
                <label class="label-text">Alasan</label>\
                    <div class="form-group">\
                        <span class="la la-pencil form-icon"></span>\
                        <textarea class="message-control form-control" name="alasan_pertimbangan_atasan" placeholder="Silahkan isi alasannya..." required></textarea>\
                    </div>\
                </div>');
            } else {
                $('#alasan_izin_cuti').closest('#alasan_izin_cuti').remove();
            }
        });
        $("#keputusan_pejabat").on("change", function() {
            var keputusan_pejabat = $(this).val();
            if (keputusan_pejabat != 'DISETUJUI') {
                $('#alasan_izin_cuti').closest('#alasan_izin_cuti').remove();
                $(".alasan_keputusan_pejabat").append('<div class="input-box" id="alasan_izin_cuti">\
                <label class="label-text">Alasan</label>\
                    <div class="form-group">\
                        <span class="la la-pencil form-icon"></span>\
                        <textarea class="message-control form-control" name="alasan_keputusan_pejabat" placeholder="Silahkan isi alasannya..." required></textarea>\
                    </div>\
                </div>');
            } else {
                $('#alasan_izin_cuti').closest('#alasan_izin_cuti').remove();
            }
        });
    });
</script>

{{-- Hide / Show Jurusan by role --}}
<script>
    $(function() {
        $("#role").on("change", function() {
            var role = $(this).val();
            if (role == 'Ketua Jurusan') {
                $(".jurusan").append('<div class="input-box jurusan2">\
                    <label class="label-text">Jurusan <span class="text-danger">*</span></label>\
                    <div class="form-group select-contain w-100">\
                        <select class="form-control" name="jurusan" required>\
                            <option value="">-- Pilih Jurusan --</option>\
                            <option value="Manajemen Informatika">Manajemen Informatika</option>\
                            <option value="Agroindustri">Agroindustri</option>\
                            <option value="Teknik Perawatan dan Perbaikan Mesin">Teknik Perawatan dan Perbaikan Mesin</option>\
                            <option value="Kesehatan">Kesehatan</option>\
                        </select>\
                    </div>\
                </div>');
            } else {
                $('#jurusan').closest('#jurusan').remove();
                $('.jurusan2').closest('.jurusan2').remove();
            }
        });
    });
</script>

<script>
    function showPassword() {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
    }

    function showPasswordBaru() {
    var passwordInput = document.getElementById("passwordBaru");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
    }
</script>

</body>
</html>