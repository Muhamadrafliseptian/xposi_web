<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
                            <i class="fa fa-fw fa-user-circle"></i>
                            Dashboard
                            <span class="badge badge-success">6</span>
                        </a>
                    </li>
                    <li class="nav-divider">
                        Master
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/jasa') ? 'active' : '' }}" href="{{ url('/admin/jasa') }}">
                            <i class="fa fa-fw fa-bars"></i> Jasa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/carousel') ? 'active' : '' }}" href="{{ url('/admin/carousel') }}">
                            <i class="fa fa-fw fa-image"></i> Carousel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/produk_layanan') ? 'active' : '' }}" href="{{ url('/admin/produk_layanan') }}">
                            <i class="fa fa-fw fa-key"></i> Produk Layanan
                        </a>
                    </li>
                    <li class="nav-divider">
                        Pengaturan
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/profil_perusahaan') ? 'active' : '' }}" href="{{ url('/admin/profil_perusahaan') }}">
                            <i class="fa fa-fw fa-search"></i> Profil Perusahaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/hubungi_kami') ? 'active' : '' }}" href="{{ url('/admin/hubungi_kami') }}">
                            <i class="fa fa-fw fa-phone"></i> Hubungi Kami
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/informasi_login') ? 'active' : '' }}" href="{{ url('/admin/informasi_login') }}">
                            <i class="fa fa-fw fa-envelope"></i> Informasi Login
                        </a>
                    </li>
                    <li class="nav-divider">
                        Akun
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-akun" aria-controls="submenu-akun"><i class="fa fa-fw fa-users"></i>
                            Akun
                        </a>
                        <div id="submenu-akun" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/admin/users') }}">
                                            Users
                                        </a>
                                    </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
