@extends('layouts.guru')

@section('content')
<div class="container-fluid content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Tugas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.tugas.update', $tugas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $tugas->judul }}" required>
                </div>
                <div class="mb-3">
                    <label>Perintah</label>
                    <input type="text" name="perintah" class="form-control" value="{{ $tugas->perintah }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{ $tugas->deskripsi }}" required>
                </div>
                <div class="mb-3">
                    <label>Deadline</label>
                    <input type="date" name="deadline" class="form-control" value="{{ $tugas->deadline }}" required>
                </div>
                <div class="mb-3">
                    <label>Tipe</label>
                    <select name="tipe" class="form-control" required>
                        <option value="individu" {{ $tugas->tipe == 'individu' ? 'selected' : '' }}>Individu</option>
                        <option value="kelompok" {{ $tugas->tipe == 'kelompok' ? 'selected' : '' }}>Kelompok</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('guru.tugas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection