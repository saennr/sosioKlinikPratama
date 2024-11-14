@extends("layouts.frontend")
@section("content")
<body>
  <!-- Main Content Section -->
  <section id="artikel">
    <div class="container">
        <!-- Section Title and Description -->
        <h1 class="section-title">What’s New On Medicaly</h1>
        <p class="section-description">
            Baca Berita Terbaru mengenai informasi medis, atau cari informasi yang anda butuhkan
        </p>
        <p>Kategori Informasi</p>
        
        <!-- Category Buttons -->
        <div class="category-buttons">
            <button class="category-btn">Artikel</button>
            <button class="category-btn">Informasi Umum</button>
            <button class="category-btn">Paket</button>
            <button class="category-btn">Testimoni</button>
            <button class="category-btn">Update</button>
        </div>
        
        <!-- Information Articles -->
        <div class="row">
            <!-- Section 1 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 18.png') }}" class="info-image" alt="Info 1">
                <div class="info-content">
                    <h5 class="info-title">Patah Tulang Panggul pada Lanjut Usia akibat Osteoporosis</h5>
                    <p class="info-text">Seiring bertambahnya usia, jumlah orang yang mengalami patah tulang panggul semakin meningkat. Patah tulang panggul...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 2 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 19.png') }}" class="info-image" alt="Info 2">
                <div class="info-content">
                    <h5 class="info-title">Flu Singapura</h5>
                    <p class="info-text">Flu Singapura atau Hand Foot and Mouth Disease (HFMD) adalah penyakit yang disebabkan oleh virus dari genus Enterovirus...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 3 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 20.png') }}" class="info-image" alt="Info 3">
                <div class="info-content">
                    <h5 class="info-title">Ambulatory Blood Pressure Monitoring</h5>
                    <p class="info-text">Ambulatory Blood Pressure Monitoring atau ABPM adalah suatu metoda pengukuran tekanan darah selama 24 jam termasuk saat tidur...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Section 1 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 18.png') }}" class="info-image" alt="Info 1">
                <div class="info-content">
                    <h5 class="info-title">Patah Tulang Panggul pada Lanjut Usia akibat Osteoporosis</h5>
                    <p class="info-text">Seiring bertambahnya usia, jumlah orang yang mengalami patah tulang panggul semakin meningkat. Patah tulang panggul...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 2 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 19.png') }}" class="info-image" alt="Info 2">
                <div class="info-content">
                    <h5 class="info-title">Flu Singapura</h5>
                    <p class="info-text">Flu Singapura atau Hand Foot and Mouth Disease (HFMD) adalah penyakit yang disebabkan oleh virus dari genus Enterovirus...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <!-- Section 3 -->
            <div class="col-md-4 info-section">
                <img src="{{ asset('lg/img/Rectangle 20.png') }}" class="info-image" alt="Info 3">
                <div class="info-content">
                    <h5 class="info-title">Ambulatory Blood Pressure Monitoring</h5>
                    <p class="info-text">Ambulatory Blood Pressure Monitoring atau ABPM adalah suatu metoda pengukuran tekanan darah selama 24 jam termasuk saat tidur...</p>
                    <a href="#" class="btn-read-more">Baca lebih lanjut</a>
                </div>
            </div>
        </div>
        
        <!-- Arrow button to navigate to another page -->
        <div class="arrow-container">
            <a href="{{ url('/halamanutama#artikel') }}" class="arrow-button">
                <span>&#10132;</span>
            </a>
        </div>
    </div>
  </section>

  <script src="{{ asset('halamanutama/halamanutama.js') }}"></script>
</body>
@endsection
