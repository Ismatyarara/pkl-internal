@extends('layouts.guru')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
            <h3 class="mb-2">Pengumpulan Tugas: {{ $tugas->judul }}</h3>
            <div>
                <label for="filterSelect" class="me-2">Filter:</label>
                <select id="filterSelect" class="form-select form-select-sm d-inline-block w-auto" onchange="applyFilter()">
                    <option value="semua">Semua</option>
                    <option value="sudah">Sudah Dinilai</option>
                    <option value="belum">Belum Dinilai</option>
                </select>
            </div>
        </div>

        <div class="row">
            @foreach ($tugas->pengumpulan as $p)
                @php
                    $ext = strtolower(pathinfo($p->file, PATHINFO_EXTENSION));
                    $statusNilai = $p->status === 'dikirim' && $p->nilai === null ? 'belum' : 'sudah';
                @endphp

                <div class="col-md-6 mb-4 pengumpulan-card" data-nilai-status="{{ $statusNilai }}">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->siswa->name ?? '-' }}</h5>
                            <p><strong>Catatan:</strong> {{ $p->catatan }}</p>

                            <div class="mb-3">
                                <strong>File:</strong><br>

                                @if ($ext === 'pdf')
                                    <iframe src="{{ asset('storage/' . $p->file) }}" width="100%" height="300px"
                                        class="mt-2 rounded border"></iframe>
                                    <div class="mt-3 d-flex gap-2">
                                        <a href="{{ asset('storage/' . $p->file) }}" target="_blank"
                                            class="btn btn-sm btn-secondary">
                                            👁️ Lihat PDF
                                        </a>
                                        <a href="{{ asset('storage/' . $p->file) }}" download
                                            class="btn btn-sm btn-success">
                                            📥 Download
                                        </a>
                                    </div>
                                @elseif(in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $p->file) }}"
                                            data-lightbox="image-{{ $p->id }}">
                                            <img src="{{ asset('storage/' . $p->file) }}" alt="File Gambar"
                                                class="img-fluid rounded" style="max-height: 250px;">
                                        </a>
                                        <div class="mt-3 d-flex gap-2">
                                            <a href="{{ asset('storage/' . $p->file) }}" target="_blank"
                                                class="btn btn-sm btn-secondary">
                                                👁️ Lihat Gambar
                                            </a>
                                            <a href="{{ asset('storage/' . $p->file) }}" download
                                                class="btn btn-sm btn-success">
                                                📥 Download
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <!-- Tombol download -->
                                    <a href="{{ asset('storage/' . $p->file) }}" download class="btn btn-sm btn-success">
                                        📥 Download
                                    </a>
                                @endif
                            </div>

                            <p><strong>Status:</strong> {{ ucfirst($p->status) }}</p>

                            <div>
                                <strong>Nilai:</strong><br>
                                @if ($p->status === 'dikirim' && $p->nilai === null)
                                    <form action="{{ route('guru.tugas.nilai', $p->id) }}" method="POST"
                                        class="d-flex mt-2" style="max-width: 300px;">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="nilai" class="form-control form-control-sm me-2"
                                            min="0" max="100" required>
                                        <button type="submit" class="btn btn-sm btn-primary">Nilai</button>
                                    </form>
                                @else
                                    <span>{{ $p->nilai }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- Filter Script -->
    <script>
        function applyFilter() {
            const filter = document.getElementById('filterSelect').value;
            const cards = document.querySelectorAll('.pengumpulan-card');

            cards.forEach(card => {
                const nilaiStatus = card.getAttribute('data-nilai-status');
                card.style.display = (filter === 'semua' || filter === nilaiStatus) ? 'block' : 'none';
            });
        }
    </script>
@endpush
