<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="{{asset ('admin/data_user/datauser.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Image">
            <h3>Zidni Nurfauzi Mahen</h3>
            <p>1227050137</p>
            <div class="green-line"></div>
        </div>
        <ul class="menu">
        <li><a href="{{ route('dashboardAdmin') }}"> <i
                        class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="{{ route('daftarAdmin') }}"> <i class="fas fa-user-plus"></i>Pendaftaran</a></li>
            <li><a href="{{ route('dataUser') }}" class="active"> <i class="fas fa-users"></i>Data User</a></li>
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
                <div class="search-bar">
                    <input type="text" placeholder="Cari Pasien" class="search-input">
                </div>
            </div>
            <div class="data-table">
                <div class="row header">
                    <div class="cell">Nama</div>
                    <div class="cell">NIM/NIP/NIK</div>
                    <div class="cell">Tanggal Lahir</div>
                    <div class="cell">No Telpon</div>
                    <div class="cell">Jenis Kelamin</div>
                    <div class="cell">Alamat</div>
                    <div class="cell"></div>
                </div>
                <div class="row">
                    <div class="cell">Zidni Nurfauzi</div>
                    <div class="cell">1227050137</div>
                    <div class="cell">22/03/2004</div>
                    <div class="cell">087744374332</div>
                    <div class="cell">Laki laki</div>
                    <div class="cell">Majalengka</div>
                    <div class="cell">
                        <button class="dropdown-btn">⋮</button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Edit</a>
                            <a href="#" class="dropdown-item">Hapus</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cell">Aen Siti</div>
                    <div class="cell">1227050129</div>
                    <div class="cell">22/03/2002</div>
                    <div class="cell">07668562671</div>
                    <div class="cell">Perempuan</div>
                    <div class="cell">Sukabumi</div>
                    <div class="cell">
                        <button class="dropdown-btn">⋮</button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Edit</a>
                            <a href="#" class="dropdown-item">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('data user/datauser.js') }}"></script>

</html>