<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">
                <img src="{{ asset('assets-landing-page/img/logo-brand.svg') }}" width="150" alt=""></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/home">
                <img src="{{ asset('assets-landing-page/img/kamen-rider-dispress.png') }}" width="35" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ $active == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard-{{ auth()->user()->level }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Users</li>
            <li class="{{ $active == 'Posisi-jabatan' ? 'active' : '' }}">
                <a class="nav-link" href="/posisi-jabatan"><i class="fas fa-user-tie"></i> <span>Posisi Jabatan</span>
                </a>
            </li>
            <li class="dropdown {{ $active1 == 'users' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'Admin' ? 'active text-info' : '' }}" href="/admin">Admin</a>
                    </li>
                    <li><a class="nav-link {{ $active == 'Officer' ? 'active text-info' : '' }}"
                            href="/officer">Officer</a></li>
                    <li><a class="nav-link {{ $active == 'Staff' ? 'active text-info' : '' }}" href="/staff">Staff</a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Manajemen Surat</li>
            <li class="{{ $active == 'Instansi' ? 'active' : '' }}">
                <a class="nav-link" href="/instansi"><i class="fas fa-building"></i> <span>Instansi</span>
                </a>
            </li>
            <li class="{{ $active == 'Nomor-klasifikasi' ? 'active' : '' }}">
                <a class="nav-link" href="/nomor-klasifikasi"><i class="fas fa-hashtag"></i> <span>Nomor
                        Klasifikasi</span>
                </a>
            </li>
            <li class="dropdown {{ $active1 == 'surat-masuk' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>Surat Masuk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'Surat-masuk' ? 'active text-info' : '' }}"
                            href="/surat">Surat Masuk</a></li>
                    @can('admin-officer')
                        <li><a class="nav-link {{ $active == 'Pengajuan-disposisi' ? 'active text-info' : '' }}"
                                href="/pengajuan-disposisi">Pengajuan Disposisi</a></li>
                    @endcan
                </ul>
            </li>
            <li class="{{ $active == 'Disposisi' ? 'active' : '' }}">
                <a class="nav-link" href="/disposisi"><i class="fas fa-envelope-open-text"></i> <span>Disposisi
                    </span>
                </a>
            </li>
            <li class="dropdown {{ $active1 == 'surat-keluar' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-envelope-open"></i>
                    <span>Surat Keluar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'surat-keluar' ? 'active text-info' : '' }}"
                            href="/surat-keluar">Surat Keluar</a></li>
                    <li><a class="nav-link {{ $active == 'surat-tugas' ? 'active text-info' : '' }}"
                            href="/surat-tugas">Surat Tugas</a></li>
                </ul>
            </li>
            <li class="menu-header">Manajemen Setting</li>
            <li class="dropdown {{ $active1 == 'setting' ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa bi bi-gear-fill"></i>
                    <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'profile' ? 'active text-info' : '' }}"
                            href="/profile">Profile</a></li>
                    @can('admin')
                        <li><a class="nav-link {{ $active == 'web-setting' ? 'active text-info' : '' }}"
                                href="/web-setting">Web Setting</a></li>
                    @endcan
                    <li>
                        <form action="/logout" method="POST" id="logout">
                            @csrf
                            <a class="nav-link text-danger submit-btn" style="cursor: pointer;">Logout</a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>
    </aside>
</div>
