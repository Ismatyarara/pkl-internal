<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
            <!-- <img src="{{ asset('assets/frontend/img/logo.png') }}" alt=""> -->
            <h1 class="sitename mb-0" style="color: #22c55e; font-weight: 700;">
                GoTugas <span style="font-size: 1.3rem;">🍃</span>
            </h1>
        </a>

        <nav id="navmenu" class="navmenu me-3">
            <ul>
                <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
                <li><a href="#about" class="active">Tentang</a></li>
                <li><a href="{{ url('join') }}">Masuk Kelas</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- Login/Register/User --}}
        @if (Route::has('login'))
            <div class="d-flex align-items-center gap-3">
                @auth
                    <div class="dropdown">
                        <a class="btn btn-outline-dark btn-sm dropdown-toggle" href="#" role="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm">Log in</a>
                @endauth
            </div>
        @endif


    </div>
</header>
