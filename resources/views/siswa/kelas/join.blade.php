@extends('layouts.frontend')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-4 text-success">Gabung Kelas 🌿</h4>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Alert error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('siswa.kelas.join') }}" method="POST" class="p-4 rounded shadow-sm"
            style="background-color: #e8f5e9;">
            @csrf
            <div class="mb-3">
                <label for="kode_kelas" class="form-label fw-bold">Kode Kelas</label>
                <input type="text" class="form-control border-success" name="kode_kelas" required>
            </div>
            <button type="submit" class="btn btn-success">Gabung Sekarang</button>
        </form>
    </div>
@endsection
