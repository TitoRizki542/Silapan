<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-light border-end" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link link-dark {{ request()->routeIs('dashboards') ? 'active' : '' }}"
                    href="{{ route('dashboards') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Kelola</div>

                {{-- Pengguna --}}
                @if (auth('admin')->user()->role === 'admin')
                    <a class="nav-link link-dark collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pengguna" aria-expanded="false" aria-controls="pengguna">
                        <div class="sb-nav-link-icon">
                            <i class="fa-regular fa-users"></i>
                        </div>
                        Pengguna
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse {{ request()->routeIs('users.*') ? 'show' : '' }}" id="pengguna"
                        aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link link-dark {{ request()->routeIs('users.pegawai*') ? 'active' : '' }}"
                                href="{{ route('users.pegawai') }}">
                                Pegawai
                            </a>
                            <a class="nav-link link-dark {{ request()->routeIs('users.masyarakat*') ? 'active' : '' }}"
                                href="{{ route('users.masyarakat') }}">
                                Masyarakat
                            </a>
                        </nav>
                    </div>
                @endif

                {{-- Administrasi --}}
                <a class="nav-link link-dark {{ request()->routeIs('admin.administrasi*') ? 'active' : '' }}"
                    href="{{ route('admin.administrasi') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa-regular fa-clipboard-list"></i>
                    </div>
                    Administrasi
                </a>
            </div>
        </div>
    </nav>
</div>
