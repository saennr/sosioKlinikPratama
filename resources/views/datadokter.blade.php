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
</head>
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
            <div class="search-bar">
                <input type="text" placeholder="Cari Pasien" class="search-input">
            </div>
        </div>
        <div class="data-table">
            <div class="row header">
                <div class="cell">Nama Dokter</div>
                <div class="cell">Spesialis</div>
                <div class="cell">Jadwal</div>
                <div class="cell">No Telepon</div>
                <div class="cell"></div>
            </div>
            <div class="row">
                <div class="cell">drg. Nina Ayu Pebriyana</div>
                <div class="cell">Poli Umum</div>
                <div class="cell">
                    <button class="btn-jadwal" onclick="toggleSchedule(this)">Jadwal Dokter</button>
                </div>
                <div class="cell">087744374332</div>
                <div class="cell">
                    <button class="dropdown-btn">⋮</button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Edit</a>
                        <a href="#" class="dropdown-item">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="schedule-container hidden">
                <div class="schedule-table">
                    <div class="schedule-row header">
                        <div class="schedule-cell">Hari</div>
                        <div class="schedule-cell">Jam Mulai</div>
                        <div class="schedule-cell">Jam Selesai</div>
                        <div class="schedule-cell">Durasi Tindakan</div>
                        <div class="schedule-cell"></div>
                    </div>
                    <div class="schedule-row">
                        <div class="schedule-cell">Senin</div>
                        <div class="schedule-cell">07.30</div>
                        <div class="schedule-cell">12.00</div>
                        <div class="schedule-cell">270 Menit</div>
                        <div class="schedule-cell">
                            <button class="dropdown-btn">⋮</button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-row">
                        <div class="schedule-cell">Senin</div>
                        <div class="schedule-cell">07.30</div>
                        <div class="schedule-cell">12.00</div>
                        <div class="schedule-cell">270 Menit</div>
                        <div class="schedule-cell">
                            <button class="dropdown-btn">⋮</button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-dokter">Tambah Jadwal</button>
            </div>
            <div class="row">
                <div class="cell">drg. Nina Ayu Pebriyana</div>
                <div class="cell">Poli Umum</div>
                <div class="cell">
                    <button class="btn-jadwal" onclick="toggleSchedule(this)">Jadwal Dokter</button>
                </div>
                <div class=" cell">087744374332
                </div>
                <div class="cell">
                    <button class="dropdown-btn">⋮</button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Edit</a>
                        <a href="#" class="dropdown-item">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="schedule-container hidden">
                <div class="schedule-table">
                    <div class="schedule-row header">
                        <div class="schedule-cell">Hari</div>
                        <div class="schedule-cell">Jam Mulai</div>
                        <div class="schedule-cell">Jam Selesai</div>
                        <div class="schedule-cell">Durasi Tindakan</div>
                        <div class="schedule-cell"></div>
                    </div>
                    <div class="schedule-row">
                        <div class="schedule-cell">Senin</div>
                        <div class="schedule-cell">07.30</div>
                        <div class="schedule-cell">12.00</div>
                        <div class="schedule-cell">270 Menit</div>
                        <div class="schedule-cell">
                            <button class="dropdown-btn">⋮</button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div class="schedule-row">
                        <div class="schedule-cell">Selasa</div>
                        <div class="schedule-cell">07.30</div>
                        <div class="schedule-cell">12.00</div>
                        <div class="schedule-cell">270 Menit</div>
                        <div class="schedule-cell">
                            <button class="dropdown-btn">⋮</button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Edit</a>
                                <a href="#" class="dropdown-item">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-dokter">Tambah Jadwal</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/admin/data_dokter/datadokter.js') }}"></script>
</body>

</html>