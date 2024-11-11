<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('profileuser/profiluser.css') }}">
</head>
<body>
    <!-- Header Section -->
    <header>
    <a href="#" class="logo">
      <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="logo">KLINIK PRATAMA
    </a>
        <nav class="navbar">
          <a href="{{ url('/halamanutama#home') }}" class="active">Beranda</a>
          <a href="{{ url('/halamanutama#artikel') }}">Artikel</a>
          <a href="{{ url('/service') }}">Layanan</a>
          <a href="{{ url('/halamanutama#kontak') }}">Kontak</a>
        </nav>
        <div class="user-profile">
          <span>Tuan Zidni Nurfauzi</span>
          <img src="{{ asset('lg/img/Ellipse 8.png') }}" alt="User Profile Picture">
        </div>
    </header>

    <!-- Home Section with Background Image -->
    <section class="home-section">
        <!-- Background image only -->
    </section>

    <!-- Profile Section -->
    <section class="profile-container py-5 bg-white">
        <div class="profile-content">
            <div class="profile-image">
                <img src="{{ asset('lg/img/Ellipse 8.png') }}" alt="Profile Photo">
            </div>
            <h2>Zidni Nurfauzi Mahen</h2>
            <p>Tanggal Registrasi 18 Maret 2024</p>
            <p>0001266 - 22 Maret 2004</p>
            <hr>
            <div class="buttons">
                <button class="btn logout" id="logoutBtn">Logout</button>
                <button class="btn medical-record">Rekam Medis</button>
            </div>
        </div>
    </section>

    <script src="{{ asset('profileuser/profiluser.js') }}"></script>
</body>
</html>
