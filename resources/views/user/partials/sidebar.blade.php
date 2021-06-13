<div class="sidebar">
    <div class="site-width">
        <ul id="side-menu" class="sidebar-menu">
            <li class="dropdown <?= $page == "Dashboard" ? 'active' : null; ?>"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
                <ul>
                    <li>
                        <a href="{{route('ppdb.dashboard')}}"><i class="icon-home mr-1"></i> Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown <?= $page == "Informasi Gelombang Pendaftaran" || $page == "Informasi Lainnya" || $page == "Informasi Beasiswa"
                                    || $page == "Detail Beasiswa" || $page == "Pengumuman Dari Pihak Sekolah" || $page == "Mading Board" ? 'active' : null; ?> "><a href="#"><i class="fas fa-info-circle"></i> Informasi</a>
                <ul>
                    <li class="dropdown"><a href="#"><i class="fas fa-newspaper"></i>Informasi PPDB</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('ppdb.info.gelombang')}}"><i class="fas fa-calendar"></i> Gelombang</a></li>
                            <li><a href="{{route('ppdb.hasil')}}"><i class="fas fa-file"></i> Hasil PPDB</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-grid"></i>Informasi Umum</a>
                        <ul class="sub-menu">
                            @if($setts->mading == 'on')
                            <li><a href="{{route('mading.umum')}}"><i class="fas fa-desktop"></i> Mading</a></li>
                            @endif
                            <li><a href="{{route('announcement.ppdb')}}"><i class="fas fa-bullhorn"></i> Pengumuman</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('ppdb.info.lainnya')}}"><i class="fas fa-file-alt"></i>Informasi Lainnya</a></li>
                    <li><a href="{{route('ppdb.info.beasiswa')}}"><i class="fas fa-receipt"></i>Informasi Beasiswa</a></li>
                </ul>
            </li>
            <li class="dropdown <?= $page == "Pendaftaran Online" ? 'active' : null; ?>"><a href="#"><i class="fas fa-flag mr-1"></i> Registrasi</a>
                <ul>
                    <li><a href="{{route('ppdb.registrasi')}}"><i class="fas fa-list"></i> Daftar PPDB</a></li>
                    <li><a href="{{route('ppdb.list_pendaftar')}}"><i class="fas fa-journal-whills"></i> List Pendaftar</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><i class="fas fa-users mr-1"></i> Social</a>
                <ul>
                    @if($setts->forum == 'on')
                    <li><a href="{{route('ppdb.forum')}}"><i class="fas fa-comment"></i> Forum PPDB</a></li>
                    @endif
                    <li><a href="{{route('ppdb.meeting.calendar')}}"><i class="fas fa-video"></i> Meeting Online</a></li>
                </ul>
            </li>
            <li class="dropdown <?= $page == "Profile Saya"  || $page == "Pengaturan Tampilan" || $page == "Aktivitas Saya" ? 'active' : null; ?>"><a href="#"><i class="fas fa-user-circle mr-1"></i> My Akun</a>
                <ul>
                    <li><a href="{{route('pengguna.profile')}}"><i class="fas fa-user-circle"></i>Profile</a></li>
                    <li><a href="{{route('pengguna.ppdb.setting')}}"><i class="fas fa-cog"></i>Setting</a></li>
                    <li><a href="{{route('ppdb.logActivity')}}"><i class="fas fa-list"></i>Log Activity</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#password"><i class="fas fa-lock"></i>Ubah Password</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="{{route('home')}}" target="_blank"><i class="fas fa-globe-asia"></i> Website</a>
                <ul>
                    <li>
                        <a href="{{route('home')}}" target="_blank"><i class="fas fa-globe-asia"></i>Go To Website</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">`
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
    </div>
</div>