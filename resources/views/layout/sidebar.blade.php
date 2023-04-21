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
                <li class="@if($title === 'Data Pegawai') page-active @endif" ><a href="/kelola-pegawai"><i class="la la-user mr-2"></i>Data Pegawai</a></li>
                <li class="@if($title === 'Data Absensi') page-active @endif" ><a href="/kelola-absensi"><i class="la la-user mr-2"></i>Data Absensi</a></li>
                <li class="@if($title === 'Data Pengajuan Cuti') page-active @endif" ><a href="/kelola-pengajuan-cuti"><i class="la la-user mr-2"></i>Data Pengajuan Cuti</a></li>
                <li class="@if($title === 'Data User') page-active @endif" ><a href="/kelola-user"><i class="la la-user mr-2"></i>Data User</a></li>
                @elseif (Session()->get('role') === 'Pegawai')
                <li class="@if($subTitle === 'Dashboard') page-active @endif"><a href="/dashboardPegawai"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>
                <li class="@if($title === 'Pengajuan Cuti') page-active @endif" ><a href="/pengajuan-cuti"><i class="la la-user mr-2"></i>Pengajuan Cuti</a></li>
                @endif
                <li><a data-toggle="modal" data-target="#logout"><i class="la la-power-off mr-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>