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
                    <li class="@if($subTitle === 'Biodata Website') page-active @endif"><a href="/biodata-website"><i class="la la-laptop mr-2"></i>Biodata Web</a></li>
                    <li class="@if($title === 'Data Pegawai') page-active @endif" ><a href="/kelola-pegawai"><i class="la la-users mr-2"></i>Kelola Pegawai</a></li>
                    <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/kelola-absensi"><i class="la la-list mr-2"></i>Kelola Absensi</a></li>
                    <li class="@if($title === 'Data Surat') page-active @endif" ><a href="/kelola-surat"><i class="la la-file mr-2"></i>Kelola Surat</a></li>
                    <li class="@if($title === 'Data Pemberitahuan') page-active @endif" ><a href="/kelola-pemberitahuan"><i class="la la-folder-o mr-2"></i>Kelola Pemberitahuan</a></li>
                    <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/kelola-pengajuan-cuti"><i class="la la-bookmark-o mr-2"></i>Kelola Pengajuan Cuti</a></li>
                    <li class="@if($title === 'Data User') page-active @endif" ><a href="/kelola-user"><i class="la la-user mr-2"></i>Kelola User</a></li>
                @elseif (Session()->get('role') === 'Pegawai')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardPegawai"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/pengajuan-cuti"><i class="la la-bookmark-o mr-2"></i>Pengajuan Cuti</a></li>
                    <li class="@if($title === 'Riwayat Pengajuan Cuti') page-active @endif" ><a href="/riwayat-pengajuan-cuti"><i class="la la-map-signs mr-2"></i>Riwayat Pengajuan Cuti</a></li>
                @elseif (Session()->get('role') === 'Pejabat')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardPejabat"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Perizinan Cuti') page-active @endif" ><a href="/perizinan-cuti-pejabat"><i class="la la-bookmark-o mr-2"></i>Perizinan Cuti</a></li>
                @elseif (Session()->get('role') === 'Atasan')
                    <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardAtasan"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                    <li class="@if($title === 'Perizinan Cuti') page-active @endif" ><a href="/perizinan-cuti-atasan"><i class="la la-bookmark-o mr-2"></i>Perizinan Cuti</a></li>
                @endif
                <li><a data-toggle="modal" data-target="#logout"><i class="la la-power-off mr-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>