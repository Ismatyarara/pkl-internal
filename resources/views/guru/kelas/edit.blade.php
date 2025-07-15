@extends('layouts.guru')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Kelas</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guru.kelas.update', $kelas->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                </div>

                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <select name="mata_pelajaran" id="" class="form-select" value="{{ old('mata_pelajaran', $kelas->mata_pelajaran) }}" required>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="IPAS">IPAS</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Al Quran">Al Quran</option>
                        <option value="PAI">PAI</option>
                        <option value="Ke Assalaaman">Ke Assalaaman</option>
                        <option value="PKN">PKN</option>
                        <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                        <option value="Ke Wirausahaan">Ke Wirausahaan</option>
                        <option value="RPL">RPL</option>
                        <option value="TBSM">TBSM</option>
                        <option value="TKRO">TKRO</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('guru.kelas.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection