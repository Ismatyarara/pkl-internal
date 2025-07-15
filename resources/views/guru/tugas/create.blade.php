@extends('layouts.guru')

@section('content')
<div class="container-fluid content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Tambah Tugas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('guru.tugas.store', ['kelas' => $kelas->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Perintah</label>
                    <input type="text" name="perintah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deadline</label>
                    <input type="date" name="deadline" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tipe Tugas</label>
                    <select name="tipe" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="individu">Individu</option>
                        <option value="kelompok">Kelompok</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Tambah Tugas</button>
            </form>
        </div>
    </div>
</div>
@endsection