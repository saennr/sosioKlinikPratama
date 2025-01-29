@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Detail Informasi</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{{ asset('lg/detail_informasi/detailinformasi.css') }}" />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="halamanutama.js"></script> -->
    </head>

    <body>
    <div class="container-informasi">
            <div class="image-container">
                <img src="{{ asset('lg/img/cekkesehatan.jpg') }}" alt="Peresmian Klinik" />
            </div>
            <div class="content">
                <h1>Klinik Pratama UIN SGD Bandung Gelar Pemeriksaan Kesehatan bagi Mahasiswa Baru</h1>
                <p>
                    Bandung, Agustus 2024 – Klinik Pratama UIN Sunan Gunung Djati Bandung kembali mengadakan pemeriksaan kesehatan bagi mahasiswa baru sebagai bagian dari rangkaian 
                    penerimaan mahasiswa tahun ajaran 2024/2025. Kegiatan ini merupakan agenda rutin yang dilaksanakan setiap tahun dan menjadi salah satu persyaratan wajib yang 
                    harus dipenuhi dalam proses pemberkasan akademik. Kegiatan ini dilaksanakan dengan beberapa sesi sesuai dengan fakultasnya masing-masing.
                </p>
                <p>
                    Pemeriksaan kesehatan ini bertujuan untuk memastikan kondisi kesehatan mahasiswa sebelum memulai aktivitas perkuliahan. Tes yang dilakukan mencakup pengecekan 
                    tekanan darah, pemeriksaan fisik umum, serta tes urine untuk mendeteksi penggunaan narkoba sebagai langkah preventif dalam menciptakan lingkungan kampus yang sehat 
                    dan bebas dari penyalahgunaan zat berbahaya.
                </p>
            </div>
        </div>
    </body>
</html>
@endsection