@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('jadwaldok/jadwaldok.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>


<header class="header-title">
    <h1>LIHAT JADWAL<br>DOKTER</h1>
</header>

<section id="jadwaldok" class="py-5 bg-white">
    <div class="jadwaldok">
        <h2 class="mb-4">Pilih Kategori Dokter</h2>
        <button class="btn btn-category mx-2" onclick="showCategory('spesialis')">Spesialis</button>
        <button class="btn btn-category mx-2" onclick="showCategory('umum')">Umum</button>
    </div>

    <!-- Spesialis Doctor Card -->
    <div id="spesialis" class="doctor-category" style="display: none;">
        @foreach ($dokterGigi as $dokter)
        <div class="doctor-card">
            <img src="{{ asset('lg/img/persondokspes.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>{{ $dokter->nama_dokter }}</h3>
                <p>{{ $dokter->spesialis->nama_spesialis }}</p>
                <div class="schedule">
                    @foreach ($dokter->jadwalDokter as $jadwal)
                        <div class="day-time"><span>{{ $jadwal->nama_jadwal }}</span> <span>{{ date('H:i', strtotime($jadwal->jam_mulai)) }} WIB</span></div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Umum Doctor Card -->
    <div id="umum" class="doctor-category" style="display: none;">
        @foreach ($dokterUmum as $dokter)
        <div class="doctor-card">
            <img src="{{ asset('lg/img/persondokum.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>{{ $dokter->nama_dokter }}</h3>
                <p>{{ $dokter->spesialis->nama_spesialis }}</p>
                <div class="schedule">
                    @foreach ($dokter->jadwalDokter as $jadwal)
                        <div class="day-time"><span>{{ $jadwal->nama_jadwal }}</span> <span>{{ date('H:i', strtotime($jadwal->jam_mulai)) }} WIB</span></div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('jadwaldok/jadwaldok.js') }}"></script>
</body>
</html>
@endsection
