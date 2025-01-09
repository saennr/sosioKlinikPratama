
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('lg/style.css') }}">

  <title>Klinik Pratama UIN SGD</title>
</head>
<body>
  <section class="welcome-section" id="beranda">
    <div class="welcome-text">
      <h1>Hallo, Selamat Datang</h1>
      <h2>Solusi Kesehatan Terbaik, <br>Hanya Untuk Anda</h2>
      <p>Kami di sini untuk mendukung Anda mencapai kesehatan optimal melalui informasi terpercaya dan layanan terbaik.</p>
      <div class="buttons">
        <a href="{{ url('/login') }}" class="btn login-btn">Login</a>
        <a href="{{ url('/daftar') }}" class="btn login-btn">Daftar</a>
        <a href="{{ route('dashboardAdmin') }}" class="btn login-btn">admin</a>
      </div>
    </div>
    <div class="doctor-image">
      <img src="{{ asset('lg/img/doctor.png') }}" alt="doctor">
    </div>
  </section>

  <script src="{{ asset('lg/script.js') }}"></script>
</body>
</html>
