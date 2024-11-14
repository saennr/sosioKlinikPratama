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
        <div class="doctor-card">
            <img src="{{ asset('lg/img/docter spesialis.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>drg. Nina Ayu Pebriyana</h3>
                <p>Dokter Gigi</p>
                <div class="schedule">
                    <div class="day-time"><span>Senin</span> <span>07.30-12.00 WIB</span></div>
                    <div class="day-time"><span>Selasa</span> <span>07.30-12.00 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>07.30-12.00 WIB</span></div>
                    <div class="day-time"><span>Kamis</span> <span>07.30-12.00 WIB</span></div>
                </div>
            </div>
        </div> 
    </div>

    <!-- Umum Doctor Cards -->
    <div id="umum" class="doctor-category" style="display: none;">
        <div class="doctor-card">
            <img src="{{ asset('lg/img/docter umum.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>dr. Suwondo Ardi Nugroho</h3>
                <p>Jadwal Praktik: Senin - Rabu</p>
                <div class="schedule">
                    <div class="day-time"><span>Senin</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Selasa</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>13.00-15.00 WIB</span></div>
                </div>
            </div>
        </div>
        <div class="doctor-card">
            <img src="{{ asset('lg/img/docter umum.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>dr. Suwondo Ardi Nugroho</h3>
                <p>Jadwal Praktik: Senin - Rabu</p>
                <div class="schedule">
                    <div class="day-time"><span>Senin</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Selasa</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>13.00-15.00 WIB</span></div>
                </div>
            </div>
        </div>
        <div class="doctor-card">
            <img src="{{ asset('lg/img/docter umum.png') }}" alt="Doctor Image">
            <div class="doctor-info">
                <h3>dr. Suwondo Ardi Nugroho</h3>
                <p>Jadwal Praktik: Senin - Rabu</p>
                <div class="schedule">
                    <div class="day-time"><span>Senin</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Selasa</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>07.30-11.30 WIB</span></div>
                    <div class="day-time"><span>Rabu</span> <span>13.00-15.00 WIB</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('jadwaldok/jadwaldok.js') }}"></script>
</body>
</html>
@endsection
