@extends('layouts.frontend')

@section('content')
<div class="container py-4">
    {{-- 📝 Header --}}
    <h4 class="fw-bold mb-4 text-success">
        <i class="bi bi-pencil-square me-1"></i> Edit Pengumpulan Tugas
    </h4>

    {{-- 🧾 Form Edit --}}
    <form method="POST" action="{{ route('siswa.tugas.update', $pengumpulan->id) }}" enctype="multipart/form-data" class="shadow-sm p-4 rounded-4 border">
        @csrf

        {{-- 🔁 Ganti File --}}
        <div class="mb-3">
            <label for="file" class="form-label fw-semibold">Ganti File (jika perlu)</label>
            <input type="file" class="form-control" name="file">
            <div class="form-text">Biarkan kosong jika tidak ingin mengganti file sebelumnya.</div>
        </div>

        {{-- ✏️ Catatan --}}
        <div class="mb-3">
            <label for="catatan" class="form-label fw-semibold">Deskripsi / Catatan</label>
            <textarea class="form-control" name="catatan" rows="4" placeholder="Tambahkan keterangan tugas...">{{ $pengumpulan->catatan }}</textarea>
        </div>

        {{-- 💾 Tombol Simpan --}}
        <div class="text-end">
            <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                <i class="bi bi-send-check me-1"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
