<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="{{ asset('admin/data_user/datauser.css') }}">
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
            <li><a href="{{ route('dashboardAdmin') }}"> <i class="fas fa-home"></i>Dashboard</a></li>
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
        <input type="text" name="query" id="searchInput" placeholder="Cari Pasien" class="search-input" value="{{ request('query') }}">
    </div>
</div>


            <div class="data-table">
                <!-- Header Tabel -->
                <div class="row header">
                    <div class="cell">Nama</div>
                    <div class="cell">NIM/NIP/NIK</div>
                    <div class="cell">Tanggal Lahir</div>
                    <div class="cell">No Telpon</div>
                    <div class="cell">Jenis Kelamin</div>
                    <div class="cell">Alamat</div>
                    <div class="cell">Aksi</div>
                </div>

                <!-- Data User -->
                <div id="userTable">
                    @foreach ($dataUsers as $dataUser)
                    <div class="row">
                        <div class="cell">{{ $dataUser->firstName }} {{ $dataUser->lastName }}</div>
                        <div class="cell">{{ $dataUser->no_identitas }}</div>
                        <div class="cell">{{ $dataUser->tgl_lahir }}</div>
                        <div class="cell">{{ $dataUser->no_hp }}</div>
                        <div class="cell">{{ $dataUser->jk }}</div>
                        <div class="cell">{{ $dataUser->alamat }}</div>
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
            </div>

        </div>
    </div>

    <script src="{{ asset('admin/data_user/datauser.js') }}"></script>

</body>

</html>
