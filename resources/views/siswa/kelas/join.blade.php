@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h4>Gabung Kelas</h4>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('siswa.kelas.join') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_kelas" class="form-label">Kode Kelas</label>
            <input type="text" class="form-control" name="kode_kelas" required>
        </div>
        <button type="submit" class="btn btn-primary">Gabung</button>
    </form>
</div>
@endsection