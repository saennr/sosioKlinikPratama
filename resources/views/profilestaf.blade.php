@extends("layouts.frontend")
@section("content")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Staff</title>
    <link rel="stylesheet" href="{{ asset('profilstaff/profilstaff.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <h1 class="text-center mb-5">Daftar Staff</h1>
        <div class="row g-4">
            @php
            $staffs = [
                [
                    'name' => 'Dr.Ambar Sulianti, dr, M.Kes',
                    'role' => 'Ketua Klinik',
                    'email' => '@gmail.com',
                    'image' => 'persondokum.png',
                ],
                [
                    'name' => 'Adam Faroqi, MT',
                    'role' => 'Sekretaris',
                    'email' => '@gmail.com',
                    'image' => 'persondokum.png',
                ],
                [
                    'name' => 'drg. Nina Ayu Pebriyana',
                    'role' => 'Penanggung Jawab Harian dan Poli Gigi',
                    'email' => '@gmail.com',
                    'image' => 'persondokum.png',
                ],
                [
                    'name' => 'dr. Suwando Ardi Nugroho',
                    'role' => 'Poli Umum dan Penanggung Jawab Gawat Darurat',
                    'email' => 'suwondoardinugroho24@gmail.com',
                    'image' => 'dr. Suwando Ardi Nugroho.jpg',
                ],
                [
                    'name' => 'dr. Yeni Mulyani, MMRS',
                    'role' => 'Poli Umum',
                    'email' => 'yeni.m.zamzam@gmail.com',
                    'image' => 'dr. yeni.jpg',
                ],
                [
                    'name' => 'dr. Diny Febriany Hasanah, MMRS',
                    'role' => 'Poli Umum',
                    'email' => '@gmail.com',
                    'image' => 'persondokum.png',
                ],
                [
                    'name' => 'Aretha Fatinita, S.Hum',
                    'role' => 'Administrasi',
                    'email' => 'rethaft@gmail.com',
                    'image' => 'Aretha Fatinita, S.Hum.jpg',
                ],
                [
                    'name' => 'Diki Saepuloh, S.Si',
                    'role' => 'Administrasi',
                    'email' => 'dikisaepuloh21@gmail.com',
                    'image' => 'Diki Saepuloh, S.Si.JPG',
                ],
                [
                    'name' => 'Suti Nur\'aeni, S.Sos',
                    'role' => 'Administrasi',
                    'email' => '@gmail.com',
                    'image' => 'persondokum.png',
                ],
                [
                    'name' => 'apt. Nucifera Choerunnisa, S.Farm',
                    'role' => 'Penanggung Jawab Farmasi',
                    'email' => 'NuciferaChoerunnisa@gmail.com',
                    'image' => 'apt. Nucifera Choerunnisa, S.Farm.jpg',
                ],
                [
                    'name' => 'apt. Hanna Nurswardiana, M.Farm',
                    'role' => 'Farmasi',
                    'email' => 'hannanurswardiana@gmail.com',
                    'image' => 'apt. Hanna Nurswardiana, M.Farm.jpg',
                ],
                [
                    'name' => 'apt. Muhammad Naufal Azhar, S.Farm',
                    'role' => 'Farmasi',
                    'email' => 'mnaufalazhar.mna@gmail.com',
                    'image' => 'apt. Muhammad Naufal Azhar, S.Farm.jpg',
                ],
                [
                    'name' => 'Hestin Vetrianing Asih, S.Tr.Kes',
                    'role' => 'Perawat Gigi',
                    'email' => 'hesvet30@gmail.com',
                    'image' => 'Hestin Vetrianing Asih, S.Tr.Kes.jpg',
                ],
                [
                    'name' => 'Evi Suhartini, S.Kep,.Ners',
                    'role' => 'Perawat Umum',
                    'email' => 'suhartinievi79@gmail.com',
                    'image' => 'Evi Suhartini, S.Kep,.Ners.jpg',
                ],
                [
                    'name' => 'Nada Ghifary Hasbiya, S.Kep., Ners',
                    'role' => 'Perawat Umum',
                    'email' => 'ghifaryn7@gmail.com',
                    'image' => 'Nada Ghifary Hasbiya, S.Kep., Ners.jpg',
                ],
                [
                    'name' => 'Ujang Kosasih',
                    'role' => 'Sarana',
                    'image' => 'Ujang Kosasih.jpg',
                ],
                [
                    'name' => 'Wendy Ajat Sudrajat',
                    'role' => 'Driver',
                    'image' => 'persondokum.png',
                ],

            ];
            @endphp

            @foreach ($staffs as $staff)
                <div class="col-md-6 col-sm-6 col-md-6">
                    <div class="card p-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="{{ asset('lg/img/' . $staff['image']) }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$staff['name'] }}</h5>
                                    <p class="card-subtitle">{{ $staff['role'] }}</p>
                                    <p class="card-email">
                                    @isset($staff['email'])
                                        <img src="{{ asset('lg/img/clarity_email-solid.png') }}" alt="Email Icon"> {{ $staff['email'] }}
                                    @else
                                        <span></span>
                                    @endisset
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
@endsection
</html>
