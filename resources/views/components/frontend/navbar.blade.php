<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('lg/img/Logo UIN.png') }}" alt="Klinik Pratama" class="logo"> KLINIK PRATAMA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#artikel">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#service">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="{{ url('/profileuser') }}">
                        <p class="mb-0">Tuan Zidni Nurfauzi</p>
                        <img src="{{ asset('lg/img/Ellipse 8.png') }}" class="rounded-circle user-icon ms-2">
                    </a>
                </li>                
            </ul>
        </div>
    </div>
</nav> 