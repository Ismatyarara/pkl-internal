@extends('layouts.frontend')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section" style="background: #f0fdf4;">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-lg-start text-center"
                    data-aos="fade-up">
                    <h1 class="fw-bold" style="color: #166534;">
                        halooSelamat Datang di <span style="color: #22c55e;">GoTugas</span> <span
                            style="font-size: 1.5rem;">🍃</span>
                    </h1>

                    <p class="text-muted fs-5 mb-4">Tugas numpuk, deadline mepet? <strong>Kumpulin dulu</strong>, baru napas
                        lega!</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('assets/frontend/img/gatau.png') }}" class="img-fluid animated rounded shadow-sm"
                        alt="Hero Image">
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->


    <!-- About Section -->
    <section id="about" class="about section" style="background-color: #f7fff7;">
        <div class="container" data-aos="fade-up">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('assets/frontend/img/gatau2.png') }}" class="img-fluid rounded shadow-sm"
                        alt="Tentang GoTugas">
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <h5 class="text-success text-uppercase mb-2" style="letter-spacing: 1px;">Tentang</h5>
                    <h2 class="fw-bold mb-3" style="color: #14532d;">Apa Itu GoTugas?</h2>
                    <p class="text-muted mb-4" style="font-size: 1rem;">
                        GoTugas adalah platform digital keren buat kamu yang pengen tugas sekolah rapi, anti mepet, dan gak
                        ribet. Semua tugas dan proyek akhir jadi gampang banget dipantau bareng tim atau guru.
                    </p>
                    <ul class="list-unstyled" style="font-size: 1rem;">
                        <li class="d-flex mb-2">
                            <span class="me-2 mt-1" style="color: #22c55e;"><i class="bi bi-dot"></i></span>
                            <span>Kumpulin tugas online kapan aja</span>
                        </li>
                        <li class="d-flex mb-2">
                            <span class="me-2 mt-1" style="color: #22c55e;"><i class="bi bi-dot"></i></span>
                            <span>Tracking progres proyek bareng tim</span>
                        </li>
                        <li class="d-flex mb-2">
                            <span class="me-2 mt-1" style="color: #22c55e;"><i class="bi bi-dot"></i></span>
                            <span>Guru bisa nilai langsung dan kasih feedback</span>
                        </li>
                        <li class="d-flex mb-2">
                            <span class="me-2 mt-1" style="color: #22c55e;"><i class="bi bi-dot"></i></span>
                            <span>Deadline? Tenang, tinggal cek di dashboard</span>
                        </li>
                    </ul>
                    <p class="mt-4 text-success fw-semibold">#GoTugasAja biar tugasmu nggak numpuk lagi 💚</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->


    <!-- Featured Services Section -->
    <section id="services" class="services section" style="background-color: #f0fdf4;">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <span class="text-success text-uppercase fw-semibold">Kelas</span>
                <h2 class="fw-bold" style="color: #14532d;">Kelas Saya</h2>
                <p class="text-muted">Berikut daftar kelas yang telah kamu ikuti</p>
            </div>

            <div class="row gy-4">
                @forelse($kelasSaya as $kelas)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm border-0 h-100 rounded-4 p-4" style="background-color: #ecfdf5;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon me-3" style="font-size: 2rem; color: #22c55e;">
                                    <i class="bi bi-easel-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1" style="color: #166534;">{{ $kelas->nama_kelas }}</h5>
                                    <small class="text-muted">{{ $kelas->mata_pelajaran }}</small>
                                </div>
                            </div>
                            <p class="text-muted mb-0">Bergabung sejak
                                <strong>{{ $kelas->pivot->created_at->format('d M Y') }}</strong>
                            </p>
                            <a href="{{ route('siswa.kelas.show', $kelas->id) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Kamu belum bergabung di kelas manapun.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- /Featured Services Section -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
@endsection
