@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Pratama</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('buatjanji/buatjanji.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <section class="header-title">
        <h1>REGISTRASI<br>JANJI KLINIK</h1>
    </section>

    <section id="buatjanji" class="py-5 bg-white">
        <div class="buatjanji">
            <form action="{{ url('/janji') }}" method="POST" id="buatJanjiForm">
                @csrf
                <div class="form-container">
                    <div class="left">
                        <label for="spesialis">Pilih Spesialis Dokter</label>
                        <select id="spesialis" name="spesialis" onchange="loadDokter(this.value)">
                            <option value="default">Pilih Spesialis Dokter</option>
                            @foreach ($spesialis as $s)
                                <option value="{{ $s->id_spesialis }}">{{ $s->nama_spesialis }}</option>
                            @endforeach
                        </select>


                        <label for="dokter">Pilih Dokter</label>
                        <select id="dokter" name="dokter" onchange="loadJadwal(this.value)">
                            <option default="default">Select Option</option>
                            <!-- Options for dokter will be populated here -->
                        </select>

                        <label for="jadwal">Pilih Jadwal Dokter</label>
                        <select id="jadwal" name="jadwal">
                            <option default="default">Select Option</option>
                            <!-- Options for jadwal will be populated here -->
                        </select>

                        <label for="jadwal">Pilih Jadwal Dokter</label>
                        <div class="input-wrap">
                            <input type="text" class="input-field" id="tanggal" name="tanggal" placeholder="Pilih Tanggal" onfocus="(this.type='date')"
                                onblur="if(this.value===''){this.type='text'}" required min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}" />
                        </div>

                    </div>
                    <div class="right">
                        <label for="keluhan">Keluhan/Sakit yang dirasakan</label>
                        <textarea id="keluhan" name="keluhan" placeholder="Jawaban Anda" required></textarea>
                        <button id="btn-submit" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Pop-up Modal -->
    <!-- <div id="popup" class="popup">
        <div class="popup-content">
            <img src="{{ asset('lg/img/envelove.png') }}" alt="Icon" class="popup-icon">
            <h2>Terimakasih</h2>
            <p>Nama pasien sudah terdaftar</p>
            <span id="close-popup" class="close-popup">&times;</span>
        </div>
    </div> -->
    
    <script src="{{ asset('buatjanji/buatjanji.js') }}"></script>
</body>

</html>
@endsection