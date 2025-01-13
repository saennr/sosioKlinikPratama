<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="{{asset ('/admin/data_dokter/datadokter.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<div class="sidebar">
    <div class="profile">
        <img src="{{ asset('lg/img/userprofile.png') }}" alt="Profile Image">
        <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>
        <p>{{ $user->no_identitas }}</p>
        <div class="green-line"></div>
    </div>
    <ul class="menu">
    <li><a href="{{ route('dashboardAdmin') }}"> <i
                        class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="{{ route('daftarAdmin') }}"> <i class="fas fa-user-plus"></i>Pendaftaran</a></li>
            <li><a href="{{ route('dataUser') }}"> <i class="fas fa-users"></i>Data User</a></li>
            <li><a href="{{ route('dataDokter') }}" class="active"> <i class="fas fa-user-md"></i>Data Dokter</a></li>
            <li><a href="{{ route('beranda') }}"> <i class="fas fa-home"></i>Beranda</a></li>
        </li>
    </ul>
</div>
<div class="container">
    <div class="header">
        <h1>Klinik Pratama</h1>
    </div>
    <div class="gray-line"></div>
    <div class="table-container">  
            <div class="table-header">  
                <button class="btn-dokter">Tambah Dokter</button>
                <!-- Modal Form -->
                <div class="modal-overlay modal-hidden"></div>
                <div id="doctorFormModal" class="modal-hidden">
                    <div class="modal-content">
                        <h3>Tambah Dokter</h3>
                        <form id="doctorForm">
                            <label for="doctorName">Nama Dokter</label>
                            <input type="text" id="doctorName" placeholder="Masukkan Nama Dokter" required />

                            <label for="specialist">Spesialis</label>
                            <input type="text" id="specialist" placeholder="Masukkan Spesialis" required />

                            <label for="jadwal">Jadwal Dokter</label>
                            <input type="text" id="specialist" placeholder="Masukkan Jadwal Dokter" required />

                            <label for="phone">No Telepon</label>
                            <input type="text" id="phone" placeholder="Masukkan No Telepon" required />

                            <button class="btn-dokter" type="submit">Simpan</button>
                            <button type="button" class="close-btn">Close</button>
                        </form>
                    </div>
                </div>
                <div class="search-bar">  
                    <input type="text" placeholder="Cari Dokter" class="search-input" id="searchInput">  
                </div>
            </div>
            <div id="dokterTableContainer">  
                @include('partials.dokter_table', ['dokters' => $dokters])
            </div>
        </div>
</div>
<script src="{{ asset('/admin/data_dokter/datadokter.js') }}"></script>
</body>

</html>