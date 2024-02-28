<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar user (optional) -->
    <div class="row user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="col image">
            <img src="{{ asset('assets/dist/img/logo_INKA2.png') }}"  alt="User Image" style="width:100%;padding:10px;background-color:rgb(232, 232, 232)">
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ (request()->routeIs('admin.dashboard') ? 'active' : '') }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!-- Profil -->
            <li class="nav-item">
                <a href="{{ route('admin.absenmasuk') }}"
                    class="nav-link {{ (request()->routeIs('admin.absenmasuk') ? 'active' : '') }}">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                    <p>
                        Absensi Masuk
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.absenkeluar') }}"
                    class="nav-link {{ (request()->routeIs('admin.absenkeluar') ? 'active' : '') }}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Absensi Keluar
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.daftar-resume') }}"
                    class="nav-link {{ (request()->routeIs('admin.absenkeluar') ? 'active' : '') }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Daftar Resume
                    </p>
                </a>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</aside>