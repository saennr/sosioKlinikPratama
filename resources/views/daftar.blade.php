<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Daftar Klinik Pratama</title>
  <link rel="stylesheet" href="{{ asset('lg/daftar/daftar.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <input type="text" name="firstName" class="input-field" value="{{ old('name') }}" required placeholder="Nama Depan" />
                @error('name') <small class="error">{{ $message }}</small> @enderror
              </div>
              <div class="input-wrap">
                <input type="text" name="lastName" class="input-field" value="{{ old('name') }}" required placeholder="Nama Belakang" />
                @error('name') <small class="error">{{ $message }}</small> @enderror
              </div>

              <div class="input-wrap">
                <input type="password" name="pw" id="password" class="input-field" required placeholder="Password" />
                @error('password') <small id= "password-error" class="error">{{ $message }}</small> @enderror
              </div>

              <div class="input-wrap">
                <input type="tel" name="no_hp" class="input-field" value="{{ old('phone') }}" required placeholder="Nomor Telepon" />
                <small class="note">Nomor WhatsApp aktif</small>
              </div>

              <div class="input-wrap">
                <input type="text" id="no_identitas" name="no_identitas" class="input-field" value="{{ old('identity_number') }}" required placeholder="Nomor Identitas" />
                <small class="note">NIM, NIP atau NIK (Masukan salah satu)</small>
              </div>

              <div class="input-wrap">
                <input type="text" name="tgl_lahir" class="input-field" value="{{ old('birth_date') }}" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(this.value===''){this.type='text'}" required />
              </div>    
              
              <div class="input-wrap" style="font-size: 14px; margin-top: 0.5rem; margin-bottom: 0.5rem;">
                <p style="margin-bottom: 0.5rem;">Jenis Kelamin:</p>
                <label>
                  <input type="radio" name="jk" value="P" required />
                  Perempuan
                </label>

                <label style="margin-left: 1rem;">
                  <input type="radio" name="jk" value="L" required />
                  Laki-laki
                </label>
              </div>

              
              <div class="input-wrap">
                <textarea name="alamat" class="input-field" required placeholder="Alamat" rows="4"></textarea>
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

  <script src="{{ asset('lg/daftar/daftar.js') }}"></script>
</body>
</html>