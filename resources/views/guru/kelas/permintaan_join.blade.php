@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h4>Permintaan Join Kelas</h4>

    @foreach($kelasSaya as $kelas)
        <div class="card my-3">
            <div class="card-header">
                {{ $kelas->nama_kelas }} ({{ $kelas->kode_kelas }})
            </div>
            <div class="card-body">
                @forelse($kelas->permintaanJoin as $permintaan)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            {{ $permintaan->siswa->nama }} - {{ $permintaan->siswa->email }}
                        </div>
                        <div>
                            <form method="POST" action="{{ route('guru.terimaPermintaan', $permintaan->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Terima</button>
                            </form>
                            <form method="POST" action="{{ route('guru.tolakPermintaan', $permintaan->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada permintaan join.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection