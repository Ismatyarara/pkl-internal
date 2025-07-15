<style>
  /* SIDEBAR PUTIH + HIJAU */
  .sb-sidenav {
    background-color: #ffffff !important; /* tetap putih bersih */
  }

  .sb-sidenav .nav-link {
    color: #16a34a !important; /* teks hijau utama */
  }

  .sb-sidenav .nav-link:hover,
  .sb-sidenav .nav-link.active {
    background-color: #dcfce7 !important; /* hijau muda hover */
    color: #15803d !important;
  }

  .sb-sidenav-menu-heading {
    color: #15803d !important;
    font-weight: bold;
  }

  .sb-nav-link-icon {
    color: #22c55e !important; /* icon hijau cerah */
  }

  .sb-sidenav-footer {
    background-color: #f0fdf4 !important;
    color: #166534 !important;
    font-weight: 500;
  }
</style>




<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <!-- Dashboard 1 -->
                <a class="nav-link" href="{{ route('guru.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Dashboard 2: User Icon -->
                <a class="nav-link" href="{{ route('guru.kelas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Daftar Kelas
                </a>

                <a class="nav-link" href="{{ route('guru.tugas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Daftar Tugas
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name ?? 'Guest' }}
        </div>
    </nav>
</div>