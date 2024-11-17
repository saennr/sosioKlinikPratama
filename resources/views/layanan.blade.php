<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service</title>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('lg/service/service.css') }}">
</head>
<body>
  
  <!-- header section -->
  <header>
  <a href="#" class="logo">
      <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="logo">KLINIK PRATAMA
    </a>
    <nav class="navbar">
      <a href="{{ url('/halamanutama#home') }}" class="active">Beranda</a>
      <a href="{{ url('/halamanutama#artikel') }}">Artikel</a>
      <a href="#layanan">Layanan</a>
      <a href="{{ url('/halamanutama#kontak') }}">Kontak</a>
    </nav>
    <div class="user-profile">
      <!-- Membungkus elemen profil dengan tag <a> tanpa merubah tampilannya -->
      <a href="{{ url('/profileuser') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
        <span>Tuan Zidni Nurfauzi</span>
        <img src="{{ asset('lg/img/userprofile.png') }}" alt="User Profile Picture">
      </a>
    </div>
  </header>

  <!-- services section -->
<section class="services" id="layanan">
  <h1>We offer several services <br>To Improve Your Health</h1>
  <div class="services-container">
    <div class="service-box" id="buat-janji">
      <img src="{{ asset('lg/img/janjidok.png') }}" alt="Buat Janji Klinik">
      <h3>Buat Janji Klinik</h3>
      <p>Buat janji dengan mudah dan bebas antre</p>
    </div>
    <div class="service-box" id="cek-lab">
      <img src="{{ asset('lg/img/ceklab.png') }}" alt="Cek Laboratorium">
      <h3>Cek Laboratorium</h3>
      <p>Cek lab tanpa ribet hanya dengan beberapa ketukan jari</p>
    </div>
    <div class="service-box" id="konsultasi-online">
      <img src="{{ asset('lg/img/konsul.png') }}" alt="Konsultasi Online">
      <h3>Konsultasi Online</h3>
      <p>Konsultasi dengan dokter hanya dengan handphone</p>
    </div>
    <div class="service-box" id="cek-radiologi">
      <img src="{{ asset('lg/img/cekradio.png') }}" alt="Cek Radiologi">
      <h3>Cek Radiologi</h3>
      <p>Cek Radiologi dengan hasil yang akurat</p>
    </div>
    <div class="service-box" id="jadwal-dokter">
      <img src="{{ asset('lg/img/jadwaldok.png') }}" alt="Jadwal Dokter">
      <h3>Jadwal Dokter</h3>
      <p>Lorem Ipsum.</p>
    </div>
  </div>
</section>

<!-- Pop-up Modal -->
<div id="popup" class="popup">
  <div class="popup-content">
    <img src="{{ asset('lg/img/comingson.png') }}" alt="Icon" class="popup-icon">
    <h2>Coming Soon</h2>
    <p>Mohon maaf untuk sekarang fasilitas ini belum tersedia</p>
    <span id="close-popup" class="close-popup">&times;</span>
  </div>
</div>

<script src="{{ asset('service/service.js') }}"></script>

</body>
</html>
