@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset ('halamanutama/halamanutama.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="{{asset ('service/service.js') }}"></script>
    <link rel="stylesheet" href="{{ url('/navbar/navbar.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!-- Home Section with Carousel -->
<section id="home">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('lg/img/profile1.png') }}" class="d-block w-100 hero-image" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/profile2.png') }}" class="d-block w-100 hero-image" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/profile3.png') }}" class="d-block w-100 hero-image" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/profile4.png') }}" class="d-block w-100 hero-image" alt="Slide 4">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/profile5.png') }}" class="d-block w-100 hero-image" alt="Slide 5">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Layanan Section -->
<section id="layanan" class="py-5 bg-white">
    <div class="article-header">
        <h1>KLINIK PRATAMA</h1>
        <p>Unit Pelaksana Teknis (UPT) Klinik Pratama UIN Bandung adalah salah satu fasilitas kampus yang bertujuan mendukung pelaksanaan misi Tri Dharma Perguruan Tinggi. Diresmikan pada tahun 2019, klinik ini memberikan pelayanan kesehatan tidak hanya untuk civitas akademika, tetapi juga masyarakat umum. Saat ini, Klinik Pratama UIN Bandung telah didukung oleh tenaga kesehatan yang profesional. Selain itu, tersedia fasilitas seperti layanan administrasi, ruang pemeriksaan, apotek, dan layanan kesehatan gigi.</p>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="icon-box">
                    <img src="{{ asset('lg/img/servis1.png') }}" alt="Medis Icon">
                    <div class="text-content">
                        <h4>Pelayanan Medis</h4>
                        <p>Mulai dari fasilitas kesehatan mendasar hingga unit-unit perawatan khusus...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box">
                    <img src="{{ asset('lg/img/servis2.png') }}" alt="Medis Icon">
                    <div class="text-content">
                        <h4>Pelayanan Farmasi</h4>
                        <p>Kami berkomitmen memberikan perawatan bio-psiko-sosial-kultural...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box">
                    <img src="{{ asset('lg/img/servis3.png') }}" alt="Medis Icon">
                    <div class="text-content">
                        <h4>Penunjang Medis</h4>
                        <p>Klinik Pratama menyediakan ruang khusus untuk kenyamanan pasien...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="artikel">
        <div class="container-artikel">
            <h2>Informasi</h2>
            <div class="row">
                <!-- Section 1 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/peresmianklinik.JPG') }}" class="info-image" alt="Info 1">
                    <div class="info-content">
                        <h5 class="info-title">Peresmian Gedung Baru KLINIK PRATAMA</h5>
                    </div>
                    <p>Peresmian Gedung Baru KLINIK PRATAMA UIN SGD Bandung dilaksanakan pada hari Selasa, 7 Januari 2025. Diresmikan langsung oleh...</p>
                    <a href="{{ route('artikel1') }}" class="btn-read-more">Baca lebih lanjut</a>
                </div>
                <!-- Section 2 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/mcu.JPG') }}" class="info-image" alt="Info 2">
                    <div class="info-content">
                        <h5 class="info-title">Klinik Pratama UIN SGD Bandung Sukses Gelar Medical Check-Up untuk Civitas Akademika</h5>
                    </div>
                    <p>Bandung, 7 Januari 2025 – Klinik Pratama UIN Sunan Gunung Djati Bandung telah sukses melaksanakan kegiatan Medical Check-Up (MCU) bagi civitas akademika. Kegiatan ini berlangsung...</p>
                    <a href="{{ route('artikel2') }}" class="btn-read-more">Baca lebih lanjut</a>
                </div>
                <!-- Section 3 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/cekkesehatan.jpg') }}" class="info-image" alt="Info 3">
                    <div class="info-content">
                        <h5 class="info-title">Klinik Pratama UIN SGD Bandung Gelar Pemeriksaan Kesehatan bagi Mahasiswa Baru</h5>
                    </div>
                    <p>Klinik Pratama UIN Sunan Gunung Djati Bandung telah sukses menyelenggarakan kegiatan pemeriksaan kesehatan bagi...</p>
                    <a href="{{ route('artikel3') }}" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <div class="arrow-container">
                <a href="{{ url('/informasi') }}" class="arrow-button">
                    <span>&#10132;</span>
                </a>
            </div>
        </div>
    </section>

    <!--Servis Section-->
<section class="services" id="services">
  <h1>We offer several services <br>To Improve Your Health</h1>
  <div class="services-container">
    <a href="{{ route('janji') }}" style="text-decoration: none; color: inherit;">
    <div class="service-box" id="buat-janji">
      <img src="{{ asset('lg/img/janjidok.png') }}" alt="Buat Janji Klinik">
      <h3>Buat Janji Klinik</h3>
      <p>Buat janji dengan mudah dan bebas antre</p>
    </div>
    </a>
    
    <button id="cek-lab-button" style="all: unset; cursor: pointer;">
        <div class="service-box" id="cek-lab">
            <img src="{{ asset('lg/img/cek lab.png') }}" alt="Cek Laboratorium">
            <h3>Cek Laboratorium</h3>
            <p>Cek lab tanpa ribet</p>
        </div>
    </button>

    <button id="cek-radio-button" style="all: unset; cursor: pointer;">
        <div class="service-box" id="cek-radiologi">
            <img src="{{ asset('lg/img/cekradio.png') }}" alt="Cek Radiologi">
            <h3>Cek Radiologi</h3>
            <p>Cek Radiologi dengan hasil yang akurat</p>
        </div>
    </button>

    <a href="{{ url('/jadwal') }}" style="text-decoration: none; color: inherit;">
    <div class="service-box" id="jadwal-dokter">
      <img src="{{ asset('lg/img/jadwaldok.png') }}" alt="Jadwal Dokter">
      <h3>Jadwal Dokter</h3>
      <p>Sesuaikan jadwal dokter untuk waktu yang lebih pas</p>
    </div>
    </a>
  </div>
</section>

<!-- Pop-up Modal -->
<!-- <div id="popup" class="popup">
  <div class="popup-content">
    <img src="{{ asset('lg/img/comingson.png') }}" alt="Icon" class="popup-icon">
    <h2>Coming Soon</h2>
    <p>Mohon maaf untuk sekarang fasilitas ini belum tersedia</p>
    <span id="close-popup" class="close-popup">&times;</span>
  </div>
</div> -->

<section class="faq">
            <div class="faq-container">
                <div class="faq-label">
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        Bagaimana cara menjaga pola makan yang sehat?<span>+</span>
                    </div>
                    <div class="faq-answer">
                        Menjaga pola makan yang sehat melibatkan konsumsi makanan bergizi seimbang, seperti buah-buahan,
                        sayuran, protein tanpa lemak, dan biji-bijian utuh. Hindari makanan olahan berlebihan dan
                        perbanyak minum air putih.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Seberapa sering saya harus melakukan pemeriksaan kesehatan rutin?<span>+</span>
                    </div>
                    <div class="faq-answer">
                        Sebagian besar orang disarankan untuk melakukan pemeriksaan kesehatan setidaknya setahun sekali.
                        Namun, frekuensinya dapat berbeda tergantung usia, riwayat kesehatan, dan kondisi tertentu.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Apa yang harus saya lakukan untuk meningkatkan sistem kekebalan tubuh? <span>+</span></div>
                    <div class="faq-answer">
                        Tidur yang cukup, makan makanan bernutrisi, berolahraga secara teratur, dan mengurangi stres
                        dapat membantu meningkatkan kekebalan tubuh. find it!
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Kapan saya harus menemui dokter?<span>+</span>
                    </div>
                    <div class="faq-answer">
                        Jika Anda mengalami gejala yang tidak biasa, seperti nyeri yang tidak hilang, demam tinggi, atau
                        perubahan signifikan pada tubuh, segera konsultasikan dengan dokter. </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Apa itu hidrasi dan mengapa penting untuk tubuh? <span>+</span> </div>
                    <div class="faq-answer">
                        Hidrasi adalah proses menjaga kadar cairan tubuh. Penting karena tubuh membutuhkan cairan untuk
                        fungsi organ, menjaga suhu tubuh, dan mendukung metabolisme. </div>
                </div>
            </div>
        </section>

    <h2 class="text-center mb-4 kontak-title">Kontak Kami</h2>
    <section id="kontak">
        <div class="row g-0">
            <!-- Contact Info Section -->
            <div class="col-md-4 contact-info p-4 text-white">
                <div class="contact-item mb-4 p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 19.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Lokasi</p>
                        <p>Jl. A.H. Nasution No.497, Cipadung, Kec. Cibiru, Kota Bandung, Jawa Barat 40614</p>
                    </div>
                </div>
                <div class="contact-item mb-4 p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 20.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Email</p>
                        <p>klinik@uinsgd.ac.id</p>
                    </div>
                </div>
                <div class="contact-item p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 22.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Telepon</p>
                        <p>085182242213</p>
                    </div>
                </div>
            </div>
    
            <!-- Form Section -->
            <div class="col-md-8 p-4 form-section">

    <form method="post" action="https://script.google.com/macros/s/AKfycbwTidqW_0gN4OtvWBl95C0Wg7PyCx3UuSNFCK78_r948TO755aX_v9mp7FZTwYn_q1Z6w/exec" name="contact-form">
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama">
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" class="form-control" id="email" placeholder="Masukan Email">
            </div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="subjek" placeholder="Subjek">
        </div>
        <div class="mb-3">
            <textarea class="form-control" id="pesan" rows="4" placeholder="Pesan"></textarea>
        </div>
        <button type="submit" class="btn btn-dark" id="btn-kirim">Kirim</button>
    </form>
</div>

<div id="loading" style="display: none;">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>

        </div>
    </section>
</section>
<script src="halamanutama/halamanutama.js"></script>
</body>
@endsection
