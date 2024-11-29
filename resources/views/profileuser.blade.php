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
  
  <title>Profile</title>
</head>

    <!-- Home Section with Background Image -->
    <section class="home-section">
        <!-- Background image only -->
    </section>

    <!-- Profile Section -->
    <section class="profile-container py-5 bg-white">
        <div class="profile-content">
            <div class="profile-image">
                <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Photo">
            </div>
            <h2>{{ $user->firstName }} {{ $user->lastName }}</h2>
            <p>Tanggal Registrasi {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</p>
            <p>{{ $user->no_identitas }} - {{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d M Y') }}</p>
            <hr>
            <div class="buttons">
                <form action="{{ route('riwayat') }}" method="GET">
                    @csrf
                    <button class="btn riwayat">RIWAYAT</button>
                </form>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn logout">LOG OUT</button>
                </form>
            </div>
        </div>
    </section>

    <script src="{{ asset('profileuser/profiluser.js') }}"></script>
</body>
@endsection