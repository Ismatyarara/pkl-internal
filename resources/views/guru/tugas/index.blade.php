@extends('layouts.guru')
@section('content')
<div class="container-fluid content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Tugas di Semua Kelas</h4>
            <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown">
    + Tambah Tugas
  </button>
  <ul class="dropdown-menu">
    @foreach($kelas as $item)
      <li>
        <a class="dropdown-item" href="{{ route('guru.tugas.create', ['kelas' => $item->id]) }}">
          {{ $item->nama_kelas }}
        </a>
      </li>
    @endforeach
  </ul>
</div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tugasTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Judul Tugas</th>
                            <th>Perintah</th>
                            <th>Deskripsi</th>
                            <th>Deadline</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($kelas as $item)
                            @foreach ($item->tugas as $tugas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_kelas }}</td>
                                <td>{{ $tugas->judul }}</td>
                                <td>{{ $tugas->perintah }}</td>
                                <td>{{ $tugas->deskripsi }}</td>
                                <td>{{ $tugas->deadline }}</td>
                                <td>{{ $tugas->tipe }}</td>
                                <td>
                                    <a href="{{ route('guru.tugas.edit', $tugas->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <a href="{{ route('guru.tugas.pengumpulan', $tugas->id) }}" class="btn btn-sm btn-info mb-1">Lihat Pengumpulan</a>
                                    <form action="{{ route('guru.tugas.destroy', $tugas->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection