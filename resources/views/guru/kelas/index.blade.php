@extends('layouts.guru')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
<style>
    .content-wrapper {
        margin-top: 30px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid content-wrapper">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Kelas</h4>
            <a href="{{ route('guru.kelas.create') }}" class="btn btn-sm btn-outline-primary">Tambah Kelas</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="kelasTable">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Kode Kelas</th>
                            <th>Aksi Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>{{ $item->guru->name ?? '-' }}</td>
                            <td><span id="kode_{{ $item->id }}">{{ $item->kode_kelas }}</span>
                                <button onclick="copyKode({{ $item->id }})">Copy</button>
                            </td>
                            <td>
                                <a href="{{ route('guru.kelas.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                <form action="{{ route('guru.kelas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kelas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function () {
        $('#kelasTable').DataTable({
            paging: false,
            searching: false,
            ordering: false,
            info: false
        });
    });
</script>
<script>
function copyKode(id) {
    const text = document.getElementById('kode_' + id).innerText;
    navigator.clipboard.writeText(text).then(function() {
        alert('Kode berhasil disalin!');
    });
}
</script>
@endpush