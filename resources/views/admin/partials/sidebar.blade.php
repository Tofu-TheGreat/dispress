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
            <li class="menu-header">Main Menu</li>
            <li class="dropdown {{ $active1 == 'users' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link {{ $active == 'Admin' ? 'active text-info' : '' }}" href="/admin">Admin</a>
                    </li>
                    <li><a class="nav-link {{ $active == 'Officer' ? 'active text-info' : '' }}"
                            href="/officer">Officer</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Staff</a></li>
                </ul>
            </li>
            <li class="dropdown {{ $active1 == 'surat' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span>Manajeman Surat</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link " href="/admin">Surat Masuk</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Surat Keluar</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">SPPD</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
