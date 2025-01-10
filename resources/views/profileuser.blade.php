@extends("layouts.frontend")
@section("content")

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="{{ asset('/lg/profileuser/profileuser.css')}}">
</head>

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
                <li>
                    @if(Auth::check() && Auth::user()->admin)  
                        <a href="{{ route('dashboardAdmin') }}" class="btn login-btn">Admin</a>  
                    @endif
                </li>
                <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="button" onclick="confirmLogout()" style="background: none; border: none; color: inherit; cursor: pointer;">Logout</button>
                </form>
                </li>
            </ul>
        </aside>

        <section class="profile-details">
            <form action="{{ route('profileUpdate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="firstName" name="firstName" value="{{ old('first_name', $user->firstName) }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="lastName" name="lastName" value="{{ old('last_name', $user->lastName) }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="no_identitas">NIM/NIP/NIK</label>
                    <input type="text" id="no_identitas" name="no_identitas" value="{{ old('no_identitas', $user->no_identitas) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="no_hp">Phone Number</label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->format('Y-m-d') : '') }}" required readonly>
                </div>
                <div class="form-group">  
                    <label for="jenis_kelamin">Jenis Kelamin</label>  
                    <input type="text" id="jk" name="jk"   
                        value="{{ old('jk', $user->jk == 'L' ? 'Laki-laki' : ($user->jk == 'P' ? 'Perempuan' : '')) }}" readonly>  
                    <input type="hidden" id="jk_hidden" name="jk_hidden" value="{{ old('jk', $user->jk) }}">  
                </div>  
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" required readonly>
                </div>  
                <button type="button" class="edit-button" onclick="enableEdit()">Edit</button>
                <button type="submit" class="update-button" style="display:none;">Update</button>
            </form>

            @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Sukses!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        customClass: {
                            confirmButton: 'custom-ok-button'
                        }
                    })
                });

                document.querySelector('form').addEventListener('submit', function() {  
                    const jkInput = document.getElementById('jk');  
                    const jkHiddenInput = document.getElementById('jk_hidden');  
            
                    // Set nilai hidden input berdasarkan nilai yang ditampilkan  
                    if (jkInput.value === 'Laki-laki') {  
                        jkHiddenInput.value = 'L';  
                    } else if (jkInput.value === 'Perempuan') {  
                        jkHiddenInput.value = 'P';  
                    }  
                });
            </script>
            @endif
        </section>
    </div>

    <script>
         function enableEdit() {
            const inputs = document.querySelectorAll('.form-group input');
            inputs.forEach(input => {
                // Hanya enable jika bukan input dengan id no_identitas
                if (input.id !== 'no_identitas' && input.id !== 'jk') {
                    input.removeAttribute('readonly');
                }
            });
                document.querySelector('.update-button').style.display = 'inline-block';
        }

        function confirmLogout() {
            Swal.fire({
                title: "Konfirmasi Logout",
                text: "Apakah Anda yakin ingin logout?",
                icon: "warning", // Ganti 'type' dengan 'icon'
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Logout!",
                cancelButtonText: "Batal",
                reverseButtons: true // Jika Anda ingin membalikkan urutan tombol
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi, kirim form logout
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>
@endsection
