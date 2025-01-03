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
  <link rel="stylesheet" href="{{ asset('/lg/riwayat/riwayat.css')}}">
</head>
    <!-- Profile Section -->
    <main>
    <div class="profile-container">
        <aside class="sidebar">
            <div class="profile-info"> 
                <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Picture" class="profile-pic">
                <h3>Zidni Nurfauzi Mahen</h3>
                <p>1227050137</p>
                <div class="green-line"></div>
            </div>
            <ul class="menu">
                <li><a href="#">Profil</a></li>
                <li><a href="#">riwayat Aktif</a></li>
                <li><a href="#" class="active">Riwayat Pendaftaran</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </aside>
        <section class="riwayat">
            <div class="riwayat-card">
                <div class="riwayat-left">
                    <img src="{{ asset('lg/img/riwayat.png') }}" alt="Icon" class="riwayat-icon">
                    <div class="riwayat-info">
                        <p class="riwayat-date">12 MARET 2024</p>
                        <p class="riwayat-doctor">dr. Suwondo Ardi Nugroho <span class="riwayat-poli">Poli
                                Umum</span></p>
                    </div>
                </div>
            </div>

            <div class="riwayat-card">
                <div class="riwayat-left">
                    <img src="{{ asset('lg/img/riwayat.png') }}" alt="Icon" class="riwayat-icon">
                    <div class="riwayat-info">
                        <p class="riwayat-date">12 MARET 2024</p>
                        <p class="riwayat-doctor">dr. Suwondo Ardi Nugroho <span class="riwayat-poli">Poli
                                Umum</span></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

    <script src="{{ asset('riwayat/riwayat.js') }}"></script>
</body>
@endsection