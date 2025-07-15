@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3>{{ $tugas->judul }}</h3>
    <p>{{ $tugas->deskripsi }}</p>

    @php
        $pengumpulan = $tugas->pengumpulan_tugas->where('siswa_id', Auth::id())->first();
    @endphp

    @if ($pengumpulan)
        <div class="alert alert-info">
            <strong>Status:</strong><br>
            @if ($pengumpulan->status === 'dikirim')
                Kamu sudah mengumpulkan tugas. <br>
                <em>Menunggu penilaian dari guru.</em>
            @elseif ($pengumpulan->status === 'dinilai')
                Tugas sudah dinilai. <br>
                <strong>Nilai kamu: {{ $pengumpulan->nilai }}</strong>
            @endif

            <br><br>
            <a href="{{ asset('storage/' . $pengumpulan->file) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                Lihat File yang Dikirim
            </a>
        </div>
    @else
        {{-- Form kumpul tugas --}}
        <form method="POST" action="{{ route('siswa.tugas.kumpulkan', $tugas->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" name="file" required>
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Deskripsi / Catatan</label>
                <textarea class="form-control" name="catatan" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kumpulkan</button>
        </form>
    @endif
</div>
@endsection