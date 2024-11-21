@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('riwayat/riwayatreservasi.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<section id="riwayat" class="py-5 bg-white">
    <div class="riwayat">
        <button id="btnReservasiAktif" class="btn btn-category mx-2">Reservasi Aktif</button>
        <button id="btnRiwayat" class="btn btn-category mx-2">Riwayat</button>
    </div>

    <div id="reservasi" class="riwayat-category">
        @foreach (range(1, 2) as $i)
        <div class="riwayat-card">
            <div class="icon">
                <img src="{{ asset('lg/img/riwayat.png') }}" alt="icon">
            </div>
            <div class="info">
                <p class="date">12 MARET 2024</p>
                <h3>
                    dr. Suwondo Ardi Nugroho
                    <span class="department">Poli Umum</span>
                </h3>
            </div>
            <button class="btn btn-success">Cek Reservasi</button>
        </div>
        @endforeach
    </div>

    <div id="riwayatCategory" class="riwayat-category" style="display: none;">
        @foreach (range(1, 2) as $i)
        <div class="riwayat-card">
            <div class="icon">
                <img src="{{ asset('lg/img/riwayat.png') }}" alt="icon">
            </div>
            <div class="info">
                <p class="date">{{ $i === 1 ? '10 JUNI 2023' : '10 JUNI 2024' }}</p>
                <h3>
                    dr. Suwondo Ardi Nugroho
                    <span class="department">Poli Umum</span>
                </h3>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Modal Structure -->
<div class="modal fade" id="reservasiModal" tabindex="-1" aria-labelledby="reservasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">KLINIK PRATAMA UIN</h5>
                        <h4 class="card-subtitle">dr. Suwondo Ardi Nugroho</h4>

                        <!-- Poli Section -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('lg/img/poli.png') }}" alt="Poli Icon">
                                <p class="mb-0">Poli</p>
                            </div>
                            <p class="mb-0">Umum</p>
                        </div>
                        <!-- Tanggal Rujukan Section -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('lg/img/tglrujukan.png') }}" alt="Tanggal Icon">
                                <p class="mb-0">Tanggal Rujukan</p>
                            </div>
                            <p class="mb-0">12-03-2024</p>
                        </div>
                        <hr>
                        <h6>Nomor Antrean</h6>
                        <h6>Klinik</h6>
                        <h2 class="text-primary">2</h2>
                        <h6>Estimasi Dilayani</h6>
                        <p>12-03-2024 17:36</p>
                        <div class="alert alert-info mt-3" role="alert">
                            <i>*) Harap datang 15 menit sebelum waktu pelayanan untuk tahap administrasi.</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('riwayat/riwayatreservasi.js') }}"></script>
</body>
</html>
@endsection