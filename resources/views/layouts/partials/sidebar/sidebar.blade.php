<div class="nav-left-sidebar sidebar-primary">
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
                            <i class="fa-solid fa-gauge"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-divider">
                        Master
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/hero') ? 'active' : '' }}" href="{{ url('/admin/hero') }}">
                            <i class="fa-sharp fa-solid fa-camera-retro"></i> Hero
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/about') ? 'active' : '' }}" href="{{ url('/admin/about') }}">
                            <i class="fa fa-fw fa-bars"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/features') ? 'active' : '' }}" href="{{ url('/admin/features') }}">
                            <i class="fa fa-fw fa-key"></i> Features
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/how_book') ? 'active' : '' }}" href="{{ url('/admin/how_book') }}">
                            <i class="fas fa-question-circle"></i> How Book Event?
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/event_newest') ? 'active' : '' }}" href="{{ url('/admin/event_newest') }}">
                            <i class="fa-regular fa-calendar-minus"></i> Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/gallery') ? 'active' : '' }}" href="{{ url('/admin/gallery') }}">
                            <i class="fa fa-image"></i> Gallery
                        </a>
                    </li>
                    <li class="nav-divider">
                        Settings
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/profile_company') ? 'active' : '' }}" href="{{ url('/admin/profile_company') }}">
                            <i class="fa fa-fw fa-search"></i> Profile Company
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/message') ? 'active' : '' }}" href="{{ url('/admin/message') }}">
                            <i class="fa fa-fw fa-phone"></i> Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/login_information') ? 'active' : '' }}" href="{{ url('/admin/login_information') }}">
                            <i class="fa-solid fa-circle-info"></i> Login Information
                        </a>
                    </li>
                    <li class="nav-divider">
                        Akun
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-akun" aria-controls="submenu-akun"><i class="fa fa-fw fa-users"></i>
                            Profile Admin
                        </a>
                        <div id="submenu-akun" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/admin/profile_administrator') }}">
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
