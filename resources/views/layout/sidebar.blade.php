<div class="sidebar-nav sidebar--nav">
    <div class="sidebar-nav-body">
        <div class="author-content">
            <div class="d-flex align-items-center">
                <div class="author-img avatar-sm">
                    <img src="@if($user->foto){{ asset('foto_user/'.$user->foto) }} @else {{ asset('foto_user/default1.jpg') }} @endif" alt="testimonial image">
                </div>
                <div class="author-bio">
                    <h4 class="author__title">{{ $user->nama }}</h4>
                    <span class="author__meta">Welcome to {{$user->role}} Panel</span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu-wrap">
            <ul class="sidebar-menu toggle-menu list-items">
                @if (Session()->get('role') === 'Admin')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardAdmin"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($subTitle === 'Setting') page-active @endif"><a href="/setting"><i class="la la-laptop mr-2"></i>Setting</a></li>
                    <li class="@if($title === 'Data Pegawai') page-active @endif" ><a href="/kelola-pegawai"><i class="la la-users mr-2"></i>Kelola Pegawai</a></li>
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/kelola-absensi"><i class="la la-list mr-2"></i>Kelola Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/kelola-surat"><i class="la la-file mr-2"></i>Arsip Surat</a></li>
                    <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/kelola-pengajuan-cuti"><i class="la la-bookmark-o mr-2"></i>Kelola Pengajuan Cuti</a></li>
                    {{-- <li class="@if($title === 'Data Ketua Jurusan') page-active @endif" ><a href="/kelola-ketua-jurusan"><i class="la la-users mr-2"></i>Kelola Ketua Jurusan</a></li>
                    <li class="@if($title === 'Data Wakil Direktur') page-active @endif" ><a href="/kelola-wakil-direktur"><i class="la la-users mr-2"></i>Kelola Wakil Direktur</a></li> --}}
                    {{-- <li class="@if($title === 'Data Artikel') page-active @endif" ><a href="/kelola-artikel"><i class="la la-folder-o mr-2"></i>Kelola Artikel</a></li> --}}
                    {{-- <li class="@if($title === 'Data User') page-active @endif" ><a href="/kelola-user"><i class="la la-user mr-2"></i>Kelola User</a></li> --}}
                @elseif (Session()->get('role') === 'Pegawai')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardPegawai"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/pengajuan-cuti"><i class="la la-bookmark-o mr-2"></i>Pengajuan Cuti</a></li>
                    <li class="@if($title === 'Riwayat Pengajuan Cuti') page-active @endif" ><a href="/riwayat-pengajuan-cuti"><i class="la la-map-signs mr-2"></i>Riwayat Pengajuan Cuti</a></li>
                    {{-- <li class="@if($title === 'Riwayat Surat Tugas') page-active @endif" ><a href="/riwayat-surat-tugas"><i class="la la-file mr-2"></i>Riwayat Surat Tugas</a></li> --}}
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/lihat-surat"><i class="la la-list mr-2"></i>Riwayat Surat</a></li>
                    
                    @elseif (Session()->get('role') === 'Wakil Direktur 1')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardWakilDirektur1"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Perizinan Cuti') page-active @endif" ><a href="/perizinan-cuti-wakil-direktur1"><i class="la la-bookmark-o mr-2"></i>Perizinan Cuti</a></li>
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/lihat-surat"><i class="la la-list mr-2"></i>Riwayat Surat</a></li>
                    
                    @elseif (Session()->get('role') === 'Wakil Direktur 2')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardWakilDirektur2"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    
                    <li class="@if($title === 'Perizinan Cuti') page-active @endif" ><a href="/perizinan-cuti-wakil-direktur2"><i class="la la-bookmark-o mr-2"></i>Perizinan Cuti</a></li>
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/lihat-surat"><i class="la la-list mr-2"></i>Riwayat Surat</a></li>
                    {{-- <li class="@if($title === 'Riwayat Surat Tugas') page-active @endif" ><a href="/riwayat-surat-tugas"><i class="la la-file mr-2"></i>Riwayat Surat Tugas</a></li> --}}
                    {{-- <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi-wakil-direktur"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li> --}}
                    @elseif (Session()->get('role') === 'Ketua Jurusan')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardKetuaJurusan"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Perizinan Cuti') page-active @endif" ><a href="/perizinan-cuti-ketua-jurusan"><i class="la la-bookmark-o mr-2"></i>Perizinan Cuti</a></li>
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/lihat-surat"><i class="la la-list mr-2"></i>Riwayat Surat</a></li>
                    <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/pengajuan-cuti-ketua-jurusan"><i class="la la-bookmark-o mr-2"></i>Pengajuan Cuti</a></li>
                    <li class="@if($title === 'Riwayat Pengajuan Cuti') page-active @endif" ><a href="/riwayat-pengajuan-cuti-ketua-jurusan"><i class="la la-map-signs mr-2"></i>Riwayat Pengajuan Cuti</a></li>
            
                @elseif (Session()->get('role') === 'Bagian Umum')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardBagianUmum"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/kelola-surat"><i class="la la-file mr-2"></i>Kelola Surat</a></li>
                    <li class="@if($title === 'Data Artikel') page-active @endif" ><a href="/kelola-artikel"><i class="la la-folder-o mr-2"></i>Kelola Artikel</a></li>
                    {{-- <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/lihat-absensi-bagian-umum"><i class="la la-list mr-2"></i>Riwayat Absensi</a></li>     --}}
                @endif
                <li><a data-toggle="modal" data-target="#logout"><i class="la la-power-off mr-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>