@extends("layouts.frontend")
@section("content")
<!-- Home Section with Carousel -->
<section id="home">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('lg/img/Slideshow1.png') }}" class="d-block w-100 hero-image" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/Slideshow2.png') }}" class="d-block w-100 hero-image" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('lg/img/Slideshow3.png') }}" class="d-block w-100 hero-image" alt="Slide 3">
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
        <p>Berawal dari langkah kecil namun penuh tekad pada tahun 1921, Klinik Pratama kini tengah melangkah menuju impian besar menjadi salah satu rumah sakit terkemuka di Jawa Barat...</p>
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
        <div class="container">
            <h2>Informasi</h2>
            <div class="row">
                <!-- Section 1 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/Rectangle 18.png') }}" class="info-image" alt="Info 1">
                    <div class="info-content">
                        <h5 class="info-title">Patah Tulang Panggul pada Lanjut Usia...</h5>
                        <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                    </div>
                </div>
                <!-- Section 2 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/Rectangle 19.png') }}" class="info-image" alt="Info 2">
                    <div class="info-content">
                        <h5 class="info-title">Flu Singapura</h5>
                        <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                    </div>
                </div>
                <!-- Section 3 -->
                <div class="col-md-4 info-section">
                    <img src="{{ asset('lg/img/Rectangle 20.png') }}" class="info-image" alt="Info 3">
                    <div class="info-content">
                        <h5 class="info-title">Ambulatory Blood Pressure Monitoring...</h5>
                        <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                    </div>
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
    <a href="{{ url('/janji') }}" style="text-decoration: none; color: inherit;">
    <div class="service-box" id="buat-janji">
      <img src="{{ asset('lg/img/janjidok.png') }}" alt="Buat Janji Klinik">
      <h3>Buat Janji Klinik</h3>
      <p>Buat janji dengan mudah dan bebas antre</p>
    </div>
    </a>
    <div class="service-box" id="cek-lab">
      <img src="{{ asset('lg/img/ceklab.png') }}" alt="Cek Laboratorium">
      <h3>Cek Laboratorium</h3>
      <p>Cek lab tanpa ribet hanya dengan beberapa ketukan jari</p>
    </div>
    <div class="service-box" id="konsultasi-online">
      <img src="{{ asset('lg/img/konsul.png') }}" alt="Konsultasi Online">
      <h3>Konsultasi Online</h3>
      <p>Konsultasi dengan dokter hanya dengan handphone</p>
    </div>
    <div class="service-box" id="cek-radiologi">
      <img src="{{ asset('lg/img/cekradio.png') }}" alt="Cek Radiologi">
      <h3>Cek Radiologi</h3>
      <p>Cek Radiologi dengan hasil yang akurat</p>
    </div>
    <a href="{{ url('/jadwal') }}" style="text-decoration: none; color: inherit;">
    <div class="service-box" id="jadwal-dokter">
      <img src="{{ asset('lg/img/jadwaldok.png') }}" alt="Jadwal Dokter">
      <h3>Jadwal Dokter</h3>
      <p>Lorem Ipsum.</p>
    </div>
    </a>
  </div>
</section>

<!-- Pop-up Modal -->
<div id="popup" class="popup">
  <div class="popup-content">
    <img src="{{ asset('lg/img/comingson.png') }}" alt="Icon" class="popup-icon">
    <h2>Coming Soon</h2>
    <p>Mohon maaf untuk sekarang fasilitas ini belum tersedia</p>
    <span id="close-popup" class="close-popup">&times;</span>
  </div>
</div>


    <h2 class="text-center mb-4 kontak-title">Kontak Kami</h2>
    <section id="kontak">
        <div class="row g-0">
            <!-- Contact Info Section -->
            <div class="col-md-4 contact-info p-4 text-white">
                <div class="contact-item mb-4 p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 19.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Lokasi</p>
                        <p>Jl. A.H. Nasution No.105, Kota Bandung, Jawa Barat.</p>
                    </div>
                </div>
                <div class="contact-item mb-4 p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 20.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Email</p>
                        <p>KlinikPratama@gmail.com</p>
                    </div>
                </div>
                <div class="contact-item p-3 d-flex align-items-center rounded">
                    <img src="{{ asset('lg/img/Group 22.png') }}">
                    <div>
                        <p class="fw-bold mb-1">Telepon</p>
                        <p>087744374332</p>
                    </div>
                </div>
            </div>
    
            <!-- Form Section -->
            <div class="col-md-8 p-4 form-section">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Masukan Nama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Masukan Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subjek">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Kirim</button>
                </form>
            </div>
        </div>
    </section>
</section>
</body>
@endsection
