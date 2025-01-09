<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Spesialis;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Reservasi;

class AdminController extends Controller
{
    public function dashboardAdmin() {
        return view('dashboard');
    }

    public function daftarAdmin() {
        return view('daftaradmin');
    }
}
