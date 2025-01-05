<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Spesialis;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class JanjiController extends Controller
{
    public function janji() {
        $spesialis = Spesialis::all();
        return view('janji', compact('spesialis'));
    }

    public function getDokterBySpesialis($idSpesialis) {
        $dokters = Dokter::where('id_spesialis', $idSpesialis)->get();

        // Tambahkan properti baru untuk nama dokter dengan satu set kurung di hari
        $dokters = $dokters->map(function ($dokter) {
            $dokter->formatted_nama_dokter = "{$dokter->nama_dokter} {$dokter->hari}";
            return $dokter;
        });

        return response()->json($dokters);
    }


    public function getJadwalByDokter($idDokter)
    {
        $jadwals = JadwalDokter::where('id_dokter', $idDokter)->get();

        $jadwals = $jadwals->map(function ($jadwal) {
            $jamMulai = Carbon::parse($jadwal->jam_mulai);
            $jamSelesai = $jamMulai->copy()->addMinutes($jadwal->durasi_tindakan);

            // Tambahkan hari dan format jadwal ke response
            $jadwal->formatted_jadwal = "{$jadwal->nama_jadwal} ({$jamMulai->format('H:i')}-{$jamSelesai->format('H:i')})";
            $jadwal->day = $jadwal->hari; // Sertakan hari ke dalam response
            return $jadwal;
        });

        return response()->json($jadwals);
    }

    public function storeJanji(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'spesialis' => 'required|exists:spesialis,id_spesialis',
            'dokter' => 'required|exists:dokters,id_dokter',
            'jadwal' => 'required|exists:jadwal_dokters,id_jadwal_dokter',
            'tanggal' => 'required|date|after_or_equal:today',
            'keluhan' => 'required|string',
        ]);
        
        // Periksa apakah user sudah memiliki reservasi pada jadwal dan tanggal yang sama
        $existingReservasi = Reservasi::where('id_user', Auth::id())
                                    ->where('id_jadwal_dokter', $request->jadwal)
                                    ->where('tanggal', $request->tanggal)
                                    ->first();

        if ($existingReservasi) {
            return response()->json(['success' => false, 'message' => 'Anda sudah memiliki reservasi pada jadwal dan tanggal tersebut.']);
        }

        // Hitung nomor antrian
        $latestAntrian = Reservasi::where('id_dokter', $request->dokter)
                                ->where('tanggal', $request->tanggal)
                                ->max('no_antrian');
        $no_antrian = $latestAntrian ? $latestAntrian + 1 : 1;

        // Ambil jadwal dokter
        $jadwal = JadwalDokter::find($request->jadwal);
        $jamMulai = Carbon::parse($jadwal->jam_mulai);

        $durasiPerPasien = ($request->spesialis == 1) ? 5 : 30;

        // Hitung estimasi waktu mulai dan selesai
        $estimasi_mulai = $jamMulai->copy()->addMinutes($durasiPerPasien * ($no_antrian - 1));
        $estimasi_selesai = $estimasi_mulai->copy()->addMinutes($durasiPerPasien);

        // // Logging data yang akan disimpan
        // Log::info('Data yang akan disimpan: ', [
        //     'id_user' => Auth::id(),
        //     'id_dokter' => $request->dokter,
        //     'id_jadwal_dokter' => $request->jadwal,
        //     'keluhan' => $request->keluhan,
        //     'tanggal' => $request->tanggal,
        //     'no_antrian' => $no_antrian,
        //     'estimasi_mulai' => $estimasi_mulai->format('H:i:s'),
        //     'estimasi_selesai' => $estimasi_selesai->format('H:i:s'),
        // ]);

        // Simpan data ke tabel reservasi
        $reservasi = Reservasi::create([
            'id_user' => Auth::id(),
            'id_dokter' => $request->dokter,
            'id_jadwal_dokter' => $request->jadwal,
            'keluhan' => $request->keluhan,
            'tanggal' => $request->tanggal,
            'no_antrian' => $no_antrian,
            'estimasi_mulai' => $estimasi_mulai->format('H:i:s'),
            'estimasi_selesai' => $estimasi_selesai->format('H:i:s'),
        ]);

        if ($reservasi) {
            return response()->json(['success' => true, 'message' => 'Reservasi berhasil dibuat.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Reservasi gagal dibuat.']);
        }
    }



}
