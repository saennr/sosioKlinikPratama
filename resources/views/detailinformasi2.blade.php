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
                <img src="{{ asset('lg/img/mcu.JPG') }}" alt="Peresmian Klinik" />
            </div>
            <div class="content">
                <h1>Klinik Pratama UIN SGD Bandung Sukses Gelar Medical Check-Up untuk Civitas Akademika</h1>
                <p>
                Klinik Pratama UIN Sunan Gunung Djati Bandung telah sukses menyelenggarakan kegiatan pemeriksaan kesehatan bagi 
                </p>
                <p>
                    Para peserta menjalani berbagai pemeriksaan kesehatan yang mencakup pengecekan tekanan darah, tes urin, usg , tredmil, rontgen, tinggi & berat badan, 
                    visus mata, pemeriksaan audiometri dan spirometri,  hingga kuonsultasi medis dengan tenaga kesehatan profesional.
                    Dengan terlaksananya kegiatan ini, Klinik Pratama UIN SGD Bandung berharap dapat terus memberikan layanan kesehatan yang berkualitas.
                </p>
            </div>
        </div>
    </body>
</html>
@endsection