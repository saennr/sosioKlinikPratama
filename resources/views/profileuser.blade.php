@extends("layouts.frontend")
@section("content")

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                <h3>Zidni Nurfauzi Mahen</h3>
                <p>1227050137</p>
                <div class="green-line"></div>
            </div>
            <ul class="menu">
                <li><a href="#" class="active">Profil</a></li>
                <li><a href="#">Reservasi Aktif</a></li>
                <li><a href="#">Riwayat Pendaftaran</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </aside>
        <section class="profile-details">
            <form>
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="nim">NIM/NIP/NIK</label>
                    <input type="text" id="nim" value="1227050137" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" value="087744374332">
                </div>
                <div class="form-group">
                    <label for="birth-date">Tanggal Lahir</label>
                    <input type="date" id="birth-date" value="2004-03-22">
                </div>
                <button type="submit" class="update-button">Update</button>
            </form>
        </section>
    </div></main>

    <script src="{{ asset('profileuser/profiluser.js') }}"></script>
</body>
@endsection