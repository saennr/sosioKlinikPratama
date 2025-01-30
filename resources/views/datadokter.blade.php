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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <button class="btn-dokter" id="btn-tambahJadwal">Tambah Jadwal</button>
            <!-- Modal Form Tambah Dokter -->
            <div class="modal-overlay modal-hidden"></div>
            <div id="doctorFormModal" class="modal-hidden">
                <div class="modal-content">
                    <h3>Tambah Dokter</h3>
                    <form id="doctorForm" method="POST" action="/tambah-dokter">
                        @csrf
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" id="nama_dokter" name="nama_dokter" placeholder="Masukkan Nama Dokter" required />

                        <label for="id_spesialis">Spesialis</label>
                        <select id="id_spesialis" name="id_spesialis" required>
                            <option value="">Pilih Spesialis</option>
                            <option value="1">Umum</option>
                            <option value="2">Gigi</option>
                        </select>

                        <label for="hari">Jadwal Dokter</label>
                        <input type="text" id="hari" name="hari" placeholder="Masukkan Jadwal Dokter" required />

                        <label for="no_telepon">No Telepon</label>
                        <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan No Telepon" required />

                        <button class="btn-dokter" type="submit">Simpan</button>
                        <button type="button" class="close-btn">Close</button>
                    </form>
                </div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Cari Dokter" class="search-input" id="searchInput">
            </div>

           <!-- form modal tambah jadwal dokter -->
<div id="doctorFormModal" class="modal-hidden">
    <div class="modal-content">
        <form id="jadwalForm" method="POST" action="/tambah-jadwal">
            @csrf
            <label for="id_dokter">Pilih Dokter</label>
            <select id="id_dokter" name="id_dokter" required>
                <option value="">Pilih Dokter</option>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama_dokter }}</option>
                @endforeach
            </select>

            <label for="nama_jadwal">Sesi</label>
            <input type="text" id="nama_jadwal" name="nama_jadwal" placeholder="Masukkan Sesi: 'Senin Pagi'" required />

            <label for="hari">Hari</label>
            <input type="text" id="hari" name="hari" placeholder="Masukkan Jadwal" required />

            <label for="jam_mulai">Jam Mulai</label>
            <input type="text" id="jam_mulai" name="jam_mulai" placeholder="Masukkan Jam Mulai" required />

            <label for="durasi_tindakan">Durasi Tindakan</label>
            <input type="text" id="durasi_tindakan" name="durasi_tindakan" placeholder="Masukkan Durasi Tindakan" required />

            <button class="btn-dokter" type="submit">Simpan</button>
            <button type="button" class="close-btn">Close</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('id_dokter').addEventListener('change', function() {
        var selectedId = this.value;
        document.getElementById('id_dokter').value = selectedId;
    });
</script>



        </div>
        <div id="dokterTableContainer">
            @include('partials.dokter_table', ['dokters' => $dokters])
        </div>
    </div>
</div>
<script src="{{ asset('/admin/data_dokter/datadokter.js') }}"></script>
</body>

</html>