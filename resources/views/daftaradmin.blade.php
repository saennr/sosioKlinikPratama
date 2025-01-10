<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="{{asset ('admin/daftar_admin/daftaradmin.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
</head>

<body>
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Image">
            <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>
            <p>{{ $user->no_identitas }}</p>
            <div class="green-line"></div>
        </div>
        <ul class="menu">
        <li><a href="{{ route('dashboardAdmin') }}" class="menu-item"> <i
                        class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="{{ route('daftarAdmin') }}" class="active"> <i class="fas fa-user-plus"></i>Pendaftaran</a></li>
            <li><a href="{{ route('dataUser') }}"> <i class="fas fa-users"></i>Data User</a></li>
            <li><a href="{{ route('dataDokter') }}"> <i class="fas fa-user-md"></i>Data Dokter</a></li>
            <li><a href="{{ route('beranda') }}"> <i class="fas fa-home"></i>Beranda</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <h1>Klinik Pratama</h1>
        </div>
        <div class="gray-line"></div>
        <div class="table-container">
        <div class="table-header">
            <div>
            <input type="date" id="filterDate" class="filter-date" />
            </div>
                <div class="dropdown-filter">
                    <button class="dropdown-toggle" id="dropdownButton">
                        Pilih Opsi
                    </button>
                    <ul class="dropdown-menu-filtter">
                        <li><a href="#" onclick="selectOption('Reservasi Aktif')">Reservasi Aktif</a></li>
                        <li><a href="#" onclick="selectOption('Semua Reservasi')">Semua Reservasi</a></li>
                        <li><a href="#" onclick="selectOption('Riwayat')">Riwayat</a></li>
                    </ul>
                </div>
            <div class="search-bar">  
                <input type="text" id="searchInput" placeholder="Cari Pasien" class="search-input">  
            </div> 
        </div>
        <div class="data-table">    
            <div class="row header">    
                <div class="cell">Nama Pasien</div>    
                <div class="cell">Nama Dokter</div>    
                <div class="cell">Tanggal</div>    
                <div class="cell">No Antrian</div>    
                <div class="cell">Estimasi</div>    
                <div class="cell"></div>    
            </div>    
        <div id="reservasiTable">  
            @include('partials.reservasi_table', ['reservasiAll' => $reservasiAll])  
        </div>  
</div>
        </div>
    </div>
</body>
<script src="admin/daftar_admin/daftaradmin.js"></script>

</html>