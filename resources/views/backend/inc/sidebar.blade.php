<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}"> <img alt="image" src="{{my_asset($pengaturan->admin_logo)}}" class="header-logo" />
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                @if(Auth()->user()->Employee->photo != null)
                <img alt="image" src="{{my_asset(Auth()->user()->Employee->photo)}}">
                @else
                <img alt="image" src="{{my_asset('admin/theme/img/user.png')}}">
                @endif
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{Auth()->user()->Employee->username}}</div>
                <div class="user-role">
                    @if(Auth()->user()->role == 1)
                    Administrator
                    @elseif(Auth()->user()->role == 2)
                    Keuangan
                    @elseif(Auth()->user()->role == 3)
                    Perpustakaan
                    @elseif(Auth()->user()->role == 4)
                    Sekretaris
                    @elseif(Auth()->user()->role == 5)
                    Kesiswaan
                    @elseif(Auth()->user()->role == 6)
                    BK
                    @endif
                </div>
                <div class="sidebar-userpic-btn">
                    <a href="{{route('admin.profile')}}">
                        <i data-feather="user"></i>
                    </a>
                    <a href="#" data-toggle="modal" data-target="#password">
                        <i data-feather="lock"></i>
                    </a>
                    <a href="{{route('setting',['general'])}}">
                        <i data-feather="settings"></i>
                    </a>
                    <a href="{{route('logout')}}" class="proses" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>

            <!-- Dashboard Menu -->
            <li <?= $page == "Dashboard Page" ? 'class="active"' : null; ?>>
                <a href="{{route('dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <!-- End Dashboard Menu -->

            <!-- Settings Menu -->
            <li class="dropdown <?= $page == "Pengaturan Website Sekolah" || $page == "Pengaturan General"
                                    || $page == "Pengaturan PPDB" || $page == "Pengaturan Email" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('setting',['general'])}}">General</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('setting',['ppdb'])}}">PPDB</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('setting',['website'])}}">Website</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('setting',['mailing'])}}">Email Settings</a>
                    </li>
                </ul>
            </li>
            <!-- End Settings menu -->

            <li class="menu-header">Website</li>

            <!-- Website Menu -->

            <li class="dropdown <?= $page == "Slider Website" || $page == "Keunggulan Sekolah" || $page == "Visi Misi Sekolah"
                                    || $page == "Tentang Sekolah" || $page == "Prestasi Sekolah" || $page == "Detail Prestasi"
                                    || $page == "Sejarah Sekolah" || $page == "List Berita" || $page == "Gallery Sekolah" ? 'active' : null; ?> ">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Attribut</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('cms',['slider'])}}">Slider</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['feature'])}}">Keunggulan</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['gallery'])}}">Gallery</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['vission'])}}">Visi Misi</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['about'])}}">About Us</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['archivement'])}}">Prestasi</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['history'])}}">Sejarah Sekolah</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown <?= $page == "Tambah Laman" || $page == "Update Laman" || $page == "Laman Builder" ? 'active' : null; ?> ">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="file-plus"></i><span>Page Builder</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('cms',['pageBuilder'])}}">List Page</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['addPage'])}}">Add Page</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown <?= $page == "Kategori Berita" || $page == "List Berita" || $page == "Tambah Berita"
                                    || $page == "Update Berita" || $page == "Detail & Analytic Berita" ? 'active' : null; ?> ">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="globe"></i><span>Berita Sekolah</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('cms',['catnews'])}}">Kategori Berita</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['news'])}}">List Berita</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['addNews'])}}">Tambah Berita</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown <?= $page == "Kategori Kegiatan" || $page == "Tambah Kegiatan" || $page == "Edit Kegiatan"
                                    || $page == "Daftar Kegiatan"  ? 'active' : null; ?> ">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="calendar"></i><span>Kegiatan Sekolah</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('cms',['catevents'])}}">Kategori Kegiatan</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['events'])}}">List Kegiatan</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['addEvents'])}}">Tambah Kegiatan</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown <?= $page == "Kontak Masuk" || $page == "Detail Pesan" || $page == "Daftar Subcriber" ? 'active' : null; ?> ">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="bookmark"></i><span>Lainnya</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('cms',['contact'])}}">Kontak</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('cms',['subcriber'])}}">Subcriber</a>
                    </li>
                </ul>
            </li>
            <!-- End Website Menu -->

            <li class="menu-header">Master Data</li>

            <!-- Master Data -->
            <li class="dropdown <?= $page == "Department" || $page == "Designation" || $page == "Data Fasilitas Sekolah"
                                    || $page == "Customer Service" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="database"></i><span>Master Attribut</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('department.list')}}">Department</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('designation')}}">Designation</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.fasilitas')}}">Fasilitas</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.cs')}}">Customer Service</a>
                    </li>

                </ul>
            </li>

            <li class="dropdown <?= $page == "List Pegawai" || $page == "Detail Pegawai" || $page == "Tambah Pegawai" || $page == "Update Pegawai"
                                    || $page == "List Pegawai Berdasarkan Designation" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Master Pegawai</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('employee')}}">Pegawai</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('employee.add')}}">Tambah Pegawai</a>
                    </li>
                </ul>
            </li>
            <!-- End Master Data -->

            <!-- Master Users -->
            <li class="dropdown <?= $page == "Admin List" || $page == "Data Guru Sekolah"
                                    || $page == "Tambah Guru sekolah" || $page == "Edit Data Guru"
                                    || $page == "Pengguna PPDB" || $page == "Log Activity Pengguna PPDB" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Master Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li <?= $page == "Admin List" ? 'class="active"' : null; ?>>
                        <a class="nav-link" href="{{route('user.admin')}}">List Admin</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.teacher')}}">List Guru</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('user.ppdb.list')}}">List User PPDB</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.users.log')}}">Log Activity</a>
                    </li>
                </ul>
            </li>
            <!-- End Master Users -->

            <!-- Master Akademik -->
            <li class="dropdown <?= $page == "Tambah Extrakulikuler" || $page == "Data Mata Pelajaran"
                                    || $page == "Data Extrakulikuler" || $page == "Update Extrakulikuler"
                                    || $page == "Pengumuman Sekolah" || $page == "Tambah Pengumuman" || $page == "Edit Pengumuman" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i class="fa fa-book"></i><span>Master Akademik</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.announcement')}}">Pengumuman Sekolah</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.mapel')}}">Mata Pelajaran</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.extra')}}">Extrakulikuler</a>
                    </li>
                </ul>
            </li>
            <!-- End Master Akademik -->

            <li class="menu-header">PPDB Sekolah</li>

            <!-- Master PPDB -->
            <li class="dropdown <?= $page == "Penerimaan Tahun Ajaran Baru" || $page == "Gelombang Pendaftaran PPDB"
                                    || $page == "Petunjuk Pendaftaran" || $page == "Daftar Beasiswa" || $page == "Info Lainnya"
                                    || $page == "Tambah Beasiswa" || $page == "Edit Beasiswa" || $page == "Detail Petunjuk Pendaftaran"
                                    || $page == "Detail Info Detail" || $page == "Pendaftar By Gelombang"  ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Master PPDB</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.guide.list')}}">Petunjuk Pendaftaran</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.tahun')}}">Tahun Ajaran</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.gelombang')}}">Gelombang Pendaftaran</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.beasiswa.list')}}">Info Beasiswa</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.other_info')}}">Info Lainnya</a>
                    </li>
                </ul>
            </li>
            <!-- End Master PPDB -->

            <!-- PPDB Menu -->
            <li class="dropdown <?= $page == "Pendaftar PPDB Online" || $page == "Detail Pendaftaran PPDB" || $page == "Pendaftar PPDB Offline"
                                    || $page == "Peserta Diterima" || $page == "Peserta Pending" || $page == "Peserta Tidak Lulus"
                                    || $page == "Tambah PPDB" || $page == "Update PPDB" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="save"></i><span>Data PPDB</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.online')}}">PPDB Online</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.offline')}}">PPDB Offline</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.diterima')}}">PPDB Lulus</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.pending')}}">PPDB Pending</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.ditolak')}}">PPDB Tidak Lulus</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.add')}}">Tambah PPDB Offline</a>
                    </li>
                </ul>
            </li>
            <!-- End PPDB -->

            <!-- PPDB SOCIAL -->
            <li class="dropdown <?= $page == "Forum PPDB Sekolah" || $page == "PPDB Mading" || $page == "Detail Forum PPDB Sekolah" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="instagram"></i><span>PPDB Social</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.forum')}}">Forum PPDB</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.ppdb.mading')}}">Mading PPDB</a>
                    </li>
                </ul>
            </li>
            <!-- END SOCIAL -->

            <!-- PPPDB MEET -->
            <li class="dropdown <?= $page == "Daftar Jadwal Meeting PPDB" || $page == "Kalendar Jadwal Meeting PPDB" || $page == "Tambah Jadwal Meeting"
                                    || $page == "Edit Jadwal Meeting" || $page == "Meeting Starting" || $page == "Meeting Detail" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="video"></i><span>PPDB Meet</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('ppdb.meet.list')}}">List Meeting</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('ppdb.meet.calendar')}}">Kalendar Meeting</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('ppdb.meet.add')}}">Tambah Meeting</a>
                    </li>
                </ul>
            </li>
            <!-- END PPDB MEET -->
            <!-- Email  -->
            <li class="dropdown <?= $page == "Kirim Pesan" || $page == "Email Keluar" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="message-square"></i><span>Email Message</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('mailing.index')}}">List Email Keluar</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('mailing.add')}}">Buat Email</a>
                    </li>
                </ul>
            </li>
            <!-- End Email -->

            <!-- Document -->
            <li class="dropdown <?= $page == "Tanda Tangan" || $page == "Category Document" || $page == "Document Template"
                                    || $page == "Buat Document" || $page  == "Document & Surat" ? 'active' : null; ?>">
                <a href="javascript:void(0)" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Document & Surat</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('document.tanda_tangan')}}">Data Tanda Tangan</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('document.category')}}">Kategory Surat / Document</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('document.template')}}">Template Surat / Document</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('document.index')}}">List Surat / Document</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('document.add')}}">Buat Surat / Document</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="menu-header">Laporan PPDB Sekolah</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="#">Laporan Ppdb</a>
                    </li>
                </ul>
            </li> -->

    </aside>
</div>