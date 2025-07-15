@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">{{ $kelas->nama_kelas }}</h3>
    <p>Total Tugas: {{ $tugas->count() }}</p>

    <div class="row mt-4">
        @forelse ($tugas as $t)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm rounded-4 border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $t->judul }}</h5>
                            <h7 class="card-title">{{ $t->mata_pelajaran }}</h7>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('siswa.tugas.show', $t->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Lihat Tugas</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada tugas.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection