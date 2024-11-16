<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function jadwal()
    {
        // Mengambil data dokter dengan spesialisasi umum
        $dokterUmum = Dokter::whereHas('spesialis', function ($query) {
            $query->where('nama_spesialis', 'umum');
        })->with('jadwalDokter')->get();

        // Mengambil data dokter dengan spesialisasi gigi
        $dokterGigi = Dokter::whereHas('spesialis', function ($query) {
            $query->where('nama_spesialis', 'gigi');
        })->with('jadwalDokter')->get();

        return view('jadwal', compact('dokterUmum', 'dokterGigi'));
    }
}
