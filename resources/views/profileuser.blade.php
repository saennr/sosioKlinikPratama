@extends("layouts.frontend")
@section("content")

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href={{url("/lg/profileuser/profileuser.css")}}>
  
  <title>medybudy</title>
</head>

    <!-- Home Section with Background Image -->
    <section class="home-section">
        <!-- Background image only -->
    </section>

    <!-- Profile Section -->
    <section class="profile-container py-5 bg-white">
        <div class="profile-content">
            <div class="profile-image">
                <img src="{{ asset('lg/img/Ellipse 8.png') }}" alt="Profile Photo">
            </div>
            <h2>Zidni Nurfauzi Mahen</h2>
            <p>Tanggal Registrasi 18 Maret 2024</p>
            <p>0001266 - 22 Maret 2004</p>
            <hr>
            <div class="buttons">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn logout">Logout</button>
                </form>
            </div>
        </div>
    </section>

    <script src="{{ asset('profileuser/profiluser.js') }}"></script>
</body>
@endsection