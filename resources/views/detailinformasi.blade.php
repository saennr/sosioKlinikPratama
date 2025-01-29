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
                <img src="{{ asset('lg/img/peresmianklinik.JPG') }}" alt="Peresmian Klinik" />
            </div>
            <div class="content">
                <h1>Peresmian Gedung Baru KLINIK PRATAMA</h1>
                <p>
                    Peresmian Gedung Baru KLINIK PRATAMA UIN SGD Bandung dilaksanakan pada hari Selasa, 7 Januari 2025.
                    Diresmikan langsung oleh Rektor UIN SGD Bandung Bapak Prof. Dr. H. Rosihon Anwar, M.Ag.
                </p>
                <p>
                    Sebagai rangkaian dari acara peresmian ini, KLINIK PRATAMA juga menyelenggarakan Medical Check-Up (MCU) bagi civitas akademika.
                    Dengan diresmikannya gedung baru ini, Klinik Pratama UIN SGD Bandung berkomitmen untuk terus meningkatkan kualitas pelayanan kesehatan
                    bagi seluruh mahasiswa, civitas akademika, dan masyarakat, serta menjadikan kampus sebagai lingkungan yang sehat dan produktif.
                </p>
            </div>
        </div>
    </body>
</html>
@endsection