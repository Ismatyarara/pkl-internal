<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/guru/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

 <style>
  /* NAVBAR HIJAU */
  .sb-topnav.navbar {
    background-color: #16a34a !important; /* Hijau utama */
  }

  .sb-topnav .navbar-brand,
  .sb-topnav .nav-link,
  .sb-topnav .navbar-nav .nav-item .nav-link,
  .sb-topnav .btn {
    color: #fff !important;
  }

  #btnNavbarSearch {
    background-color: #16a34a;
    border-color: #16a34a;
    color: #fff;
  }

  #btnNavbarSearch:hover {
    background-color: #15803d;
    border-color: #15803d;
  }
</style>

@yield('styles')
</head>


<body class="sb-nav-fixed">

    <!-- ✅ Navbar Pink -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">Dashboard Guru</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Search Form -->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" />
                <button class="btn btn-primary" type="button" id="btnNavbarSearch">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <!-- User Dropdown -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="dropdown-item" type="submit"
                                onclick="return confirm('Yakin ingin logout?')">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</body>

</html>
