<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('style.css') }}">

  <title>medybudy</title>
</head>
<body>

  <!-- header section starts -->
  <header>

    <a href="#" class="logo">
      <img src="{{ asset('img/Logo medybudy.png') }}" alt="Medybudy Logo">
    </a>

    <nav class="navbar">
      <a href="#login">login</a>
      <a class="active" href="#beranda">home</a>
      <a href="#artikel">artikel</a>
      <a href="#layanan">layanan</a>
      <a href="#kontak">kontak</a>
    </nav>

    <div class="login">
      <a href="{{ url('/login') }}">Login</a>
    </div>
    
    <div class="menu-bars">
      <i class="fas fa-bars" id="menu-bars"></i>
    </div>

  </header>
  <!-- header section end -->
  
  <section class="welcome-section" id="beranda">
    <div class="welcome-text">
      <h1>Hallo, Selamat Datang</h1>
      <h2>Solusi Kesehatan Terbaik, <br>Hanya Untuk Anda</h2>
      <p>Kami di sini untuk mendukung Anda mencapai kesehatan optimal melalui informasi terpercaya dan layanan terbaik.</p>
      <div class="buttons">
        <a href="{{ url('/login') }}" class="btn login-btn">Login</a>
        <a href="{{ url('/daftar') }}" class="btn login-btn">Daftar</a>
      </div>
    </div>
    <div class="doctor-image">
      <img src="{{ asset('img/doctor.png') }}" alt="doctor">
    </div>
  </section>

  <br>
  <br>
  <br>

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

  <script src="{{ asset('script.js') }}"></script>
</body>
</html>
