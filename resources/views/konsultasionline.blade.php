<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('konsultasionlinne/konsultasionline.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="logo"> KLINIK PRATAMA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/halamanutama#home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/halamanutama#artikel') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/service') }}">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/halamanutama#kontak') }}">Kontak</a></li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{ url('/profileuser') }}">
                            <p class="mb-0">Tuan Zidni Nurfauzi</p>
                            <img src="{{ asset('lg/img/userprofile.png') }}" class="rounded-circle user-icon ms-2">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header-title">
        <h1>REGISTRASI<br>KONSULTASI ONLINE</h1>
    </header>

    <section id="buatjanji" class="py-5 bg-white">
        <div class="buatjanji">
            <div class="form-container">
                <div class="left">
                    <label for="spesialis">Pilih Spesialis Dokter</label>
                    <select id="spesialis">
                        <option>Pilih Spesialis Dokter</option>
                    </select>

                    <label for="dokter">Pilih Dokter</label>
                    <select id="dokter">
                        <option>Select Option</option>
                    </select>

                    <label for="jadwal">Pilih Jadwal Dokter</label>
                    <select id="jadwal">
                        <option>Select Option</option>
                    </select>

                    <label for="jadwal">Pilih Jadwal Dokter</label>
                    <div class="input-wrap">
                        <input type="text" class="input-field" placeholder="Pilih Tanggal" onfocus="(this.type='date')"
                            onblur="if(this.value===''){this.type='text'}" required />
                    </div>
                </div>
                <div class="right">
                    <label for="keluhan">Keluhan/Sakit yang dirasakan</label>
                    <textarea id="keluhan" placeholder="Jawaban Anda"></textarea>
                    <div class="note">
                        <i class="fas fa-info-circle"></i>
                        <span>Konsultasi online hanya bisa di lakukan dalam waktu 10 menit</span>
                    </div>
                    <button id="btn-submit" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </section>

    <div id="popup" class="popup">
        <div class="popup-content">
            <img src="{{ asset('lg/img/envelove.png') }}" alt="Icon" class="popup-icon"> <!-- Replace with your icon path -->
            <h2>Terimakasih</h2>
            <p>Nama pasien sudah terdaftar</p>
            <button id="open-whatsapp" type="submit">Buka Whatsapp</button>
            <span id="close-popup" class="close-popup">&times;</span>
        </div>
    </div>

    <script src="{{ asset('konsultasionline/konsultasionline.js') }}"></script>

</body>

</html>
