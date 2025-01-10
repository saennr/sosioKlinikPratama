<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title> 
    <link rel="stylesheet" href="{{asset ('admin/dashboard/dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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
            <li><a href="{{ route('dashboardAdmin') }}" class="active"> <i
                        class="fas fa-chart-pie"></i>Dashboard</a></li>
            <li><a href="{{ route('daftarAdmin') }}"> <i class="fas fa-user-plus"></i>Pendaftaran</a></li>
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
        <div class="dashboard-welcome">
            <span>Welcome Admin</span>
        </div>

        <div class="dashboard-info">
            <div class="card">
                <h3>User Terdaftar</h3>
                <img src="{{ asset('lg/img/user.png') }}" alt="User Icon" class="icon">
                <p>{{ $jumlahUsers }} User</p>
            </div>
            <div class="card">
                <h3>Dokter Terdaftar</h3>
                <img src="{{ asset('lg/img/doctor-icon.png') }}" alt="Doctor Icon" class="icon">
                <p>{{ $jumlahDokter }} Dokter</p>
            </div>
            <div class="card">
                <h3>Pasien Terdaftar</h3>
                <img src="{{ asset('lg/img/pasien.png') }}" alt="Patient Icon" class="icon">
                <p>{{ $jumlahPasien }} Pasien</p>
            </div>
        </div>

        <span style="font-weight: bold;">Pendaftaran Hari Ini</span>  
        <div class="table-container">  
            <div class="row header">  
                <div class="cell">Nama Pasien</div>  
                <div class="cell">Nama Dokter</div>  
                <div class="cell">Tanggal</div>  
                <div class="cell">No Antrian</div>  
                <div class="cell">Estimasi</div>  
                <div class="cell"></div>  
            </div>  
            @foreach($reservasiHariIni as $reservasi)  
                <div class="row">  
                    <div class="cell">{{ $reservasi->user->firstName }} {{ $reservasi->user->lastName }}</div>  
                    <div class="cell">{{ $reservasi->dokter->nama }}</div>  
                    <div class="cell">{{ $reservasi->tanggal->format('d/m/Y') }}</div>  
                    <div class="cell">Antrian {{ $reservasi->no_antrian }}</div>  
                    <div class="cell">{{ $reservasi->estimasi_mulai }}</div>  
                    <div class="cell">  
                        <button class="dropdown-btn">⋮</button>  
                        <div class="dropdown-menu">  
                            <a href="#" class="dropdown-item">Edit</a>  
                            <a href="#" class="dropdown-item">Hapus</a>  
                        </div>  
                    </div>  
                </div>  
            @endforeach  
        </div>  

        <div class="view-all">
            <a href="{{ route('daftarAdmin') }}">Lihat Semua</a>
        </div>
    </div>
</body>
<script src="{{ asset('admin/dashboard/dashboard.js') }}"></script>

</html>