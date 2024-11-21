<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="{{ url('/navbar/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route ('beranda') }}#home">
            <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="navLogo"> KLINIK PRATAMA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route ('beranda') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route ('beranda') }}#artikel">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route ('beranda') }}#services">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route ('beranda') }}#kontak">Kontak</a></li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="../profileuser">
                        <p class="mb-0">{{ Auth::user()->firstName }}</p>
                        <img src="../lg/img/userprofile.png" class="rounded-circle user-icon ms-2">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

