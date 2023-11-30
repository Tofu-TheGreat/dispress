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
                <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Users</li>
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
            <li class="{{ $active == 'Perusahaan' ? 'active' : '' }}">
                <a class="nav-link" href="/perusahaan"><i class="fas fa-building"></i> <span>Perusahaan</span>
                </a>
            </li>
            <li class="dropdown {{ $active1 == 'manajemen-surat' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>Surat</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'Nomor-klasifikasi' ? 'active text-info' : '' }}"
                            href="/nomor-klasifikasi">Nomor Klasifikasi</a></li>
                    <li><a class="nav-link {{ $active == 'Surat-masuk' ? 'active text-info' : '' }}"
                            href="/surat">Surat Masuk</a></li>
                    <li><a class="nav-link {{ $active == 'Disposisi' ? 'active text-info' : '' }}"
                            href="/disposisi">Disposisi</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Surat Keluar</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">SPPD</a></li>
                </ul>
            </li>
            <li class="menu-header">Manajemen Setting</li>
            <li class="dropdown {{ $active1 == 'setting' ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa bi bi-gear-fill"></i>
                    <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="/logout" method="POST" id="logout">
                            @csrf
                            <a class="nav-link text-danger submit-btn" style="cursor: pointer;">Logout</a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
