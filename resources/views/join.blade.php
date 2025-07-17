@extends('layouts.frontend')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4" style="color: #388e3c;">Gabung ke Kelas 🍀</h3>

        {{-- Alert sukses (ijo) --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Alert error (merah) --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('siswa.kelas.join.proses') }}" class="p-4 rounded shadow-sm"
            style="background-color: #e8f5e9;">
            @csrf
            <div class="mb-3">
                <label for="kode_kelas" class="form-label fw-bold">Kode Kelas</label>
                <input type="text" name="kode_kelas" class="form-control border-success" required>
            </div>
            <button type="submit" class="btn btn-success">Gabung</button>
        </form>
    </div>
@endsection
