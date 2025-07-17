@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3 text-success">{{ $kelas->nama_kelas }}</h3>
    <p>Total Tugas: {{ $tugas->count() }}</p>

    <div class="row mt-4">
        @forelse ($tugas as $t)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-4 border border-success h-100" style="background-color: #e8f5e9;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title text-success">{{ $t->judul }}</h5>
                            <small class="text-muted">{{ $t->mata_pelajaran }}</small>
                        </div>
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <a href="{{ route('siswa.tugas.show', $t->id) }}" class="btn btn-sm btn-outline-success rounded-pill">
                                📄 Lihat Tugas
                            </a>

                            {{-- Tombol Edit, hanya untuk guru/superadmin --}}
                            @if (auth()->user()->role === 'guru' || auth()->user()->role === 'superadmin')
                                <a href="{{ route('guru.tugas.edit', $t->id) }}" class="btn btn-sm btn-success rounded-pill">
                                    ✏️ Edit
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-success text-center">
                    Belum ada tugas untuk kelas ini 🌿
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
