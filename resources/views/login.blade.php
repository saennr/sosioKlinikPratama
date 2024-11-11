<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Klinik Pratama</title>
  <link rel="stylesheet" href="{{ asset('lg/login/login.css') }}">
</head>
<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <div class="logo">
            <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Logo UIN">
          </div>
          <form class="sign-in-form" onsubmit="redirectToMain(event)">
            <div class="heading">
              <h2>Masuk</h2>
            </div>
            <p class="text">Untuk keamanan Masuk dengan</p>
            <div class="google-login" onclick="signInWithGoogle()">
              <img src="{{ asset('lg/img/google.png') }}" alt="Google Icon"> Sign in with Google
            </div>
            <p class="text">Atau gunakan Email</p>
            <div class="actual-form">
              <div class="input-wrap">
                <input 
                  type="email" 
                  class="input-field"
                  autocomplete="off"
                  id="email"
                  required
                  placeholder="Email"
                />
              </div>
              <div class="input-wrap">
                <input 
                  type="password" 
                  minlength="4"
                  class="input-field"
                  autocomplete="off"
                  id="pass"
                  required
                  placeholder="Password"
                />
              </div>
              <p class="text">
                <a href="#">Lupa Password</a>
              </p>
              <input type="submit" value="Log In" class="sign-btn">
              <div class="to-signup">
                <p>Belum punya akun? <a href="{{ url('/daftar') }}" class="toggle">Daftar disini!</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="icons"></div>
      <div class="carousel"></div>
    </div>
  </main>

  <!-- js file -->
  <script src="{{ asset('lg/login/login.js') }}"></script>
</body>
</html>
