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

    <!-- Reservasi Aktif -->
    <div id="reservasi" class="riwayat-category" style="display: none;">
        @if($reservasiAktif->isEmpty())
            <p class="reservasi-text text-center">Tidak ada reservasi aktif saat ini.</p>
        @else
            @foreach ($reservasiAktif as $reservasi)
            <div class="riwayat-card">
                <div class="icon">
                    <img src="{{ asset('lg/img/riwayat.png') }}" alt="icon">
                </div>
                <div class="info">
                    <p class="date">
                        {{ \Carbon\Carbon::parse($reservasi->tanggal)->format('Y-m-d') }}  {{ $reservasi->jadwalDokter->jam_mulai }}
                    </p>

                    <h3>
                        {{ $reservasi->dokter->nama_dokter }}
                        <span class="department">{{ $reservasi->dokter->spesialis->nama_spesialis }}</span>
                    </h3>
                </div>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reservasiModal-{{ $reservasi->id_reservasi }}">Cek Reservasi</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="reservasiModal-{{ $reservasi->id_reservasi }}" tabindex="-1" aria-labelledby="reservasiModalLabel" aria-hidden="true" data-bs-backdrop="false">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservasiModalLabel">Detail Reservasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">KLINIK PRATAMA UIN</h5>
                                    <h4 class="card-subtitle">{{ $reservasi->dokter->nama_dokter }}</h4>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Poli</p>
                                        <p class="mb-0">{{ $reservasi->dokter->spesialis->nama_spesialis }}</p>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p class="mb-0">Tanggal Pemeriksaan</p>
                                        <p class="mb-0">{{ \Carbon\Carbon::parse($reservasi->tanggal)->format('Y-m-d') }}</p>
                                    </div>
                                    <hr>
                                    <h6>Nomor Antrean</h6>
                                    <h2 class="text-primary">{{ $reservasi->no_antrian }}</h2>
                                    <h6>Estimasi Dilayani</h6>
                                    <p>{{ \Carbon\Carbon::parse($reservasi->tanggal)->format('Y-m-d') }} {{ \Carbon\Carbon::parse($reservasi->estimasi_mulai)->format('H:i') }}</p>
                                    <div class="alert alert-info mt-3" role="alert">
                                        <i>*) Harap datang 15 menit sebelum waktu pelayanan untuk tahap administrasi.</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <!-- Riwayat Reservasi -->
    <div id="riwayatCategory" class="riwayat-category" style="display: none;">
        @if($riwayatReservasi->isEmpty())
            <p class="reservasi-text text-center">Tidak ada riwayat reservasi.</p>
        @else
            @foreach ($riwayatReservasi as $reservasi)
            <div class="riwayat-card">
                <div class="icon">
                    <img src="{{ asset('lg/img/riwayat.png') }}" alt="icon">
                </div>
                <div class="info">
                    <p class="date">{{ \Carbon\Carbon::parse($reservasi->tanggal)->format('Y-m-d') }} {{ $reservasi->jadwalDokter->jam_mulai }}</p>
                    <h3>
                        {{ $reservasi->dokter->nama_dokter }}
                        <span class="department">{{ $reservasi->dokter->spesialis->nama_spesialis }}</span>
                    </h3>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('riwayat/riwayatreservasi.js') }}"></script>
</body>
</html>
@endsection
