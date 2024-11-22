<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class RiwayatReservasiController extends Controller
{
    public function riwayat()
    {
        $today = now()->toDateString();

        // Ambil reservasi aktif (tanggal >= hari ini)
        $reservasiAktif = Reservasi::with(['dokter', 'jadwalDokter'])
            ->where('tanggal', '>=', $today)
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ambil riwayat reservasi (tanggal < hari ini)
        $riwayatReservasi = Reservasi::with(['dokter', 'jadwalDokter'])
            ->where('tanggal', '<', $today)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('riwayatreservasi', compact('reservasiAktif', 'riwayatReservasi'));
    }
}
