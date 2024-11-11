<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar/Klinik Pratama</title>
  <link rel="stylesheet" href="{{ asset('lg/daftar/daftar.css') }}">
</head>
<body>
  <main>
    <div class="box">
      <div class="carousel"></div>
      <div class="inner-box">
        <div class="forms-wrap">
          <div class="logo">
            <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Medical+">
          </div>
          <form class="sign-up-form" onsubmit="redirectToLogin(event)">
            <div class="heading">
              <h2>Daftar</h2>
              <p>Lengkapi identitas diri anda</p>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="tel" class="input-field" required placeholder="Nomor Telepon" />
              </div>

              <div class="input-wrap">
                <input type="email" class="input-field" required placeholder="Email" />
              </div>

              <div class="input-wrap">
                <input type="password" class="input-field" required placeholder="Password" />
              </div>

              <button type="submit" class="sign-btn">Sign Up</button>

              <div class="to-signup">
                <p>Sudah punya akun? <a href="{{ url('/login') }}" class="toggle">Masuk disini!</a></p>
              </div>
            </div>
          </form>
        </div>
        <div class="icons"></div>
      </div>
    </div>
  </main>

  <script src="{{ asset('lg/daftar/daftar.js') }}"></script>
</body>
</html>
