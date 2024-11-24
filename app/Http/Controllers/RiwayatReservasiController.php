<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class RiwayatReservasiController extends Controller
{
    public function riwayat()
    {
        $userId = auth()->id();
        $today = now()->toDateString();

        // Ambil reservasi aktif untuk pengguna login
        $reservasiAktif = Reservasi::with(['dokter.spesialis', 'jadwalDokter'])
        ->where('id_user', $userId) // Filter berdasarkan user yang login
        ->where('tanggal', '>=', $today)
        ->orderBy('tanggal', 'asc')
        ->get();

        // Ambil riwayat reservasi untuk pengguna login
        $riwayatReservasi = Reservasi::with(['dokter.spesialis', 'jadwalDokter'])
        ->where('id_user', $userId) // Filter berdasarkan user yang login
        ->where('tanggal', '<', $today)
        ->orderBy('tanggal', 'desc')
        ->get();

        return view('riwayatreservasi', compact('reservasiAktif', 'riwayatReservasi'));
    }
}
