<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Klinik Pratama</title>
  <link rel="stylesheet" href="{{ asset('daftar/daftar.css') }}">
</head>
<body>
  <main>
    <div class="box">
      <div class="carousel"></div>
      <div class="inner-box">
        <div class="forms-wrap">
          <div class="logo">
            <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Logo UIN">
          </div>
          <form class="sign-up-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="heading">
              <h2>Daftar</h2>
              <p>Lengkapi identitas diri anda</p>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="text" name="name" class="input-field" value="{{ old('name') }}" required placeholder="Nama" />
                @error('name') <small class="error">{{ $message }}</small> @enderror
              </div>

              <div class="input-wrap">
                <input type="email" name="email" class="input-field" value="{{ old('email') }}" required placeholder="Email" />
                @error('email') <small class="error">{{ $message }}</small> @enderror
              </div>

              <div class="input-wrap">
                <input type="password" name="password" class="input-field" required placeholder="Password" />
                @error('password') <small class="error">{{ $message }}</small> @enderror
              </div>

              <div class="input-wrap">
                <input type="tel" name="phone" class="input-field" value="{{ old('phone') }}" required placeholder="Nomor Telepon" />
                <small class="note">Nomor WhatsApp aktif</small>
              </div>

              <div class="input-wrap">
                <input type="text" name="identity_number" class="input-field" value="{{ old('identity_number') }}" required placeholder="Nomor Identitas" />
                <small class="note">NIM, NIP atau NIK (Masukan salah satu)</small>
              </div>

              <div class="input-wrap">
                <input type="text" name="birth_date" class="input-field" value="{{ old('birth_date') }}" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(this.value===''){this.type='text'}" required />
              </div>              

              <button type="submit" class="sign-btn">Sign Up</button>

              <div class="to-signup">
                <p>Sudah punya akun? <a href="{{ route('login') }}" class="toggle">Masuk disini!</a></p>
              </div>
            </div>
          </form>
        </div>
        <div class="icons"></div>
      </div>
    </div>
  </main>

  <script src="{{ asset('daftar/daftar.js') }}"></script>
</body>
</html>
