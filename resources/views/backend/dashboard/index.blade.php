@extends('layouts.backend')

@section('content')
    <div class="container-fluid">
        <!-- 🟢 SELAMAT DATANG + CUACA -->
        <div class="section-header mb-4 text-center p-4 rounded" style="background-color: #f0fdf4">
            <h2 class="fw-bold mb-1">🌿 Selamat Datang, Admin!</h2>
            <p class="mb-2">Semoga harimu menyenangkan & sistem berjalan lancar hari ini ✨</p>

            @if(isset($weather))
                @php
                    $temp = round($weather['main']['temp']);
                    $desc = ucfirst($weather['weather'][0]['description']);
                    $icon = $weather['weather'][0]['icon'];
                @endphp
                <div class="d-flex align-items-center justify-content-center gap-3 mt-2">
                    <img src="http://openweathermap.org/img/wn/{{ $icon }}@2x.png" alt="cuaca" width="55">
                    <div class="text-start">
                        <strong>{{ $desc }}</strong><br>
                        <span class="text-success fs-5">{{ $temp }}°C</span>
                        <div class="text-muted small">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y • HH:mm') }}</div>
                    </div>
                </div>
            @else
                <div class="text-danger small mt-2">Gagal memuat data cuaca</div>
            @endif
        </div>

     
    </div>
@endsection
