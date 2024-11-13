<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('lg/style.css') }}">

  <title>medybudy</title>
</head>
<body>

  <!-- header section starts -->
  <header>

    <a href="#" class="logo">
      <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="logo">KLINIK PRATAMA
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
      <img src="{{ asset('lg/img/doctor.png') }}" alt="doctor">
    </div>
  </section>

  <script src="{{ asset('lg/script.js') }}"></script>
</body>
</html>
