@extends("layouts.frontend")
@section("content")
<head>
    <link rel="stylesheet" href="halamanutama/informasi.css">
</head>
<body>
  <!-- Main Content Section -->
  <section id="artikel">
    <div class="container-artikel">
        <!-- Section Title and Description -->
        <h1 class="section-title">Activities at the Pratama Clinic</h1>
        <p class="section-description">
            Baca Informasi kegiatan apa saja yang ada di KLINIK PRATAMA UIN SGD Bandung.
        </p>
        
        <!-- Information Articles -->
        <div class="row">
            <!-- Section 1 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/peresmianklinik.JPG') }}" class="info-image" alt="Info 1">
                <div class="info-content">
                    <h5 class="info-title">Peresmian Gedung Baru KLINIK PRATAMA</h5>
                    <p class="info-text">Peresmian Gedung Baru KLINIK PRATAMA UIN SGD Bandung dilaksanakan pada hari Selasa, 7 Januari 2025. Diresmikan langsung oleh...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 2 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/mcu.JPG') }}" class="info-image" alt="Info 2">
                <div class="info-content">
                    <h5 class="info-title">Klinik Pratama UIN SGD Bandung Sukses Gelar Medical Check-Up untuk Civitas Akademika</h5>
                    <p class="info-text">Bandung, 7 Januari 2025 – Klinik Pratama UIN Sunan Gunung Djati Bandung telah sukses melaksanakan kegiatan Medical Check-Up (MCU) bagi civitas akademika. Kegiatan ini berlangsung...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 3 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 20.png') }}" class="info-image" alt="Info 3">
                <div class="info-content">
                    <h5 class="info-title">Klinik Pratama UIN SGD Bandung Gelar Pemeriksaan Kesehatan bagi Mahasiswa Baru</h5>
                    <p class="info-text">Bandung, [Tanggal] – Klinik Pratama UIN Sunan Gunung Djati Bandung telah sukses menyelenggarakan kegiatan pemeriksaan kesehatan bagi...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
        </div>
        
        <!-- Arrow button to navigate to another page -->
        <div class="arrow-container">
            <a href="{{ route ('beranda') }}#artikel" class="arrow-button">
                <span>&#10132;</span>
            </a>
        </div>
    </div>
  </section>

  <script src="{{ asset('halamanutama/halamanutama.js') }}"></script>
</body>
@endsection
