@extends("layouts.frontend")
@section("content")

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('/lg/reservasi/reservasi.css') }}">
</head>
<body>
    <!-- Profile Section -->
    <main>
        <div class="profile-container">
            <aside class="sidebar">
                <div class="profile-info"> 
                    <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Picture" class="profile-pic">
                    <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>
                    <p>{{ $user->no_identitas }}</p>
                    <div class="green-line"></div>
                </div>
                <ul class="menu">
                    <li><a href="../profileuser">Profil</a></li>
                    <li><a href="{{ route('reservasiAktif') }}" class="active">Reservasi Aktif</a></li>
                    <li><a href="{{ route('riwayatPendaftaran') }}">Riwayat Pendaftaran</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="button" onclick="confirmLogout()" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </aside>
            <section class="reservasi">
                @foreach ($reservasiAktif as $reservasi)
                    <div class="reservasi-card">
                        <div class="reservasi-left">
                            <img src="{{ asset('lg/img/riwayat.png') }}" alt="Icon" class="reservasi-icon">
                            <div class="reservasi-info">
                                <p class="reservasi-date">{{ \Carbon\Carbon::parse($reservasi->tanggal)->translatedFormat('d F Y') }}</p>
                                <p class="reservasi-doctor">{{ $reservasi->dokter->nama_dokter }} <span class="reservasi-poli">{{ $reservasi->dokter->spesialis->nama_spesialis }}</span></p>
                            </div>
                        </div>
                        <div class="reservasi-right">
                            <button class="reservasi-button" data-bs-toggle="modal" data-bs-target="#reservasiModal-{{ $reservasi->id_reservasi }}">Cek Reservasi</button>
                        </div>
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
            </section>
        </div>
    </main>

    <script src="{{ asset('lg/reservasi/reservasi.js') }}"></script>
</body>
@endsection
