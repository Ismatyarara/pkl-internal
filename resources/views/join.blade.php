@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <h3>Join Kelas</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('siswa.kelas.join.proses') }}">
        @csrf
        <div class="mb-3">
            <label for="kode_kelas" class="form-label">Kode Kelas</label>
            <input type="text" name="kode_kelas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Gabung</button>
    </form>
</div>
@endsection