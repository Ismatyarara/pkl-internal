<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #2196f3;">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="">Dashboard Guru</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Search Form -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <!-- kosong -->
    </form>

    <!-- User Dropdown -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="dropdown-item" type="submit" onclick="return confirm('Yakin ingin logout?')">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>