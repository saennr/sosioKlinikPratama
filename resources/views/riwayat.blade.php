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
    <link rel="stylesheet" href="{{ asset('/lg/riwayat/riwayat.css') }}">
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
                    <li><a href="{{ route('reservasiAktif') }}">Reservasi Aktif</a></li>
                    <li><a href="{{ route('riwayatPendaftaran') }}" class="active">Riwayat Pendaftaran</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </aside>
            <section class="riwayat">
                @foreach ($riwayatReservasi as $reservasi)
                    <div class="riwayat-card">
                        <div class="riwayat-left">
                            <img src="{{ asset('lg/img/riwayat.png') }}" alt="Icon" class="riwayat-icon">
                            <div class="riwayat-info">
                                <p class="riwayat-date">{{ \Carbon\Carbon::parse($reservasi->tanggal)->translatedFormat('d F Y') }}</p>
                                <p class="riwayat-doctor">{{ $reservasi->dokter->nama_dokter }} <span class="riwayat-poli">{{ $reservasi->dokter->spesialis->nama_spesialis }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </main>

    <script src="{{ asset('riwayat/riwayat.js') }}"></script>
</body>
@endsection