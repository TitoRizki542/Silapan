<nav class="navbar navbar-expand-lg bg-white">
    <div class="container py-2">
        <a class="navbar-brand fw-bold text-success" href="/">
            <img src="{{ URL::asset('assets/img/logo_magelang.jpg') }}" alt="logo" width="30px">
            <span class="ms-2 fw-bold">SILAPAN</span>
        </a>

        <a class="navbar-toggler border-0 p-0" role="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fs-6"></span>
        </a>

        <div class="w-100">
            <ul class="navbar-nav mx-auto d-none d-md-flex justify-content-center gap-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('formulir') ? 'active' : '' }}"
                        href="{{ route('formulir') }}">
                        Formulir
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('administrasi*') ? 'active' : '' }}"
                            href="{{ route('administrasi') }}">
                            Pelayanan Administrasi
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-md-center ms-auto">
                {{-- Responsive --}}
                <li class="nav-item d-md-none">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li class="nav-item mb-3 d-md-none">
                    <a class="nav-link {{ request()->routeIs('formulir') ? 'active' : '' }}"
                        href="{{ route('formulir') }}">
                        Formulir
                    </a>
                </li>
                @auth
                    <li class="nav-item d-md-none">
                        <a class="nav-link {{ request()->routeIs('administrasi') ? 'active' : '' }}"
                            href="{{ route('administrasi') }}">
                            Pelayanan Administrasi
                        </a>
                    </li>
                @endauth
                {{-- End Responsive --}}

                @if (auth('web')->guest() && auth('admin')->guest())
                    <li class="nav-item">
                        <div class="d-flex gap-1 ms-md-2">
                            <a href="{{ route('login') }}" class="btn btn-success rounded-pill">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-success rounded-pill">
                                Daftar
                            </a>
                        </div>
                    </li>
                @endif

                @if (auth('web')->user())
                    <li class="nav-item dropdown">
                        <a role="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex gap-2 align-items-center dropdown-toggle">
                                <div class="rounded-circle"
                                    style="background-image: url(https://cdn-icons-png.flaticon.com/512/219/219986.png); background-size: cover; background-repeat: no-repeat; width: 35px; height: 35px;">
                                </div>
                                <span>
                                    {{ auth()->user()->user_detail->nama_depan }}
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa-regular fa-address-card"></i> Profil
                                </a>
                            </li>
                            <hr class="my-1">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @elseif (auth('admin')->user())
                    <li class="nav-item dropdown">
                        <a role="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex gap-2 align-items-center dropdown-toggle">
                                <div class="rounded-circle"
                                    style="background-image: url(https://cdn-icons-png.flaticon.com/512/219/219986.png); background-size: cover; background-repeat: no-repeat; width: 35px; height: 35px;">
                                </div>
                                <span>
                                    {{ auth('admin')->name }}
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa-regular fa-address-card"></i> Dashboard
                                </a>
                            </li>
                            <hr class="my-1">
                            <li>
                                <form action="{{ route('logout.admin') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
        </ul>
    </div>
</div>
</nav>
