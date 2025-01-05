@extends("layouts.frontend")
@section("content")
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('/lg/profileuser/profileuser.css')}}">
</head>
    <!-- Profile Section -->
    <main>
    <div class="profile-container">
        <aside class="sidebar">
            <div class="profile-info"> 
                <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Picture" class="profile-pic">
                <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>
                <p>{{ $user->no_identitas }}</p>
                <div class="green-line"></div>
            </div>
            <ul class="menu">
                <li><a href="../profileuser" class="active">Profil</a></li>
                <li><a href="{{ route('reservasiAktif') }}">Reservasi Aktif</a></li>
                <li><a href="{{ route('riwayatPendaftaran') }}">Riwayat Pendaftaran</a></li>
                <li><form action="{{ route('logout') }}" method="POST" style ="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                    </form>
                </li>
            </ul>
        </aside>
        <section class="profile-details">
        <form action="{{ route('profileUpdate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first_name" value="{{ old('firstName', $user->firstName) }}" required readonly>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name" value="{{ old('lastName', $user->lastName) }}" required readonly>
            </div>
            <div class="form-group">
                <label for="nim">NIM/NIP/NIK</label>
                <input type="text" id="nim" name="nim" value="{{ old('nim', $user->no_identitas) }}" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->no_hp) }}" required readonly>
            </div>
            <div class="form-group">
                <label for="birth-date">Tanggal Lahir</label>
                <input type="date" id="birth-date" name="birth_date" value="{{ old('birth_date', $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->format('Y-m-d') : '') }}" required readonly>
            </div>
            <button type="button" class="edit-button" onclick="enableEdit()">Edit</button>
            <button type="submit" class="update-button" style="display:none;">Update</button>
        </form>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </section>
    </div>
    <script>
        function enableEdit() {
            const inputs = document.querySelectorAll('.form-group input');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });
            document.querySelector('.update-button').style.display = 'inline-block';
        }
    </script>
</body>
@endsection