<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Spesialis;
use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Reservasi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboardAdmin() {
        $user = Auth::user();
        $jumlahUsers = User::count();
        $jumlahDokter = Dokter::count();
        $jumlahPasien = Reservasi::whereDate('tanggal', now())->count();
        
        $reservasiHariIni = Reservasi::whereDate('tanggal', now())->get();
        return view('dashboard', compact('user', 'jumlahUsers', 'jumlahDokter', 'jumlahPasien', 'reservasiHariIni'));
    }

    public function daftarAdmin(Request $request) {    
        $user = Auth::user();    
            
        // Ambil semua reservasi    
        $reservasiAll = Reservasi::with(['user', 'dokter'])->get(); // Ambil semua reservasi tanpa filter  
      
        return view('daftaradmin', compact('user', 'reservasiAll'));    
    }  
    
    public function cariReservasi(Request $request) {  
        $query = $request->input('query');  
    
        // Ambil reservasi berdasarkan nama pasien  
        $reservasiAll = Reservasi::with(['user', 'dokter'])  
            ->whereHas('user', function($q) use ($query) {  
                $q->where('firstName', 'LIKE', "%{$query}%")  
                  ->orWhere('lastName', 'LIKE', "%{$query}%");  
            })  
            ->get();  
    
        // Kembalikan hanya bagian tabel  
        return view('partials.reservasi_table', compact('reservasiAll'));  
    }

    public function cariUser(Request $request) {
        $query = $request->input('query');
    
        // Cari data user berdasarkan nama depan, nama belakang, atau no_identitas
        $dataUsers = User::where('firstName', 'LIKE', "%{$query}%")
            ->orWhere('lastName', 'LIKE', "%{$query}%")
            ->orWhere('no_identitas', 'LIKE', "%{$query}%")
            ->get();
    
        // Ambil data pengguna yang sedang login
        $user = Auth::user();
    
        // Kembalikan view partial dengan data pengguna yang ditemukan
        return view('partials.user_table', compact('user', 'dataUsers'));
    }
    
    

    public function filterByDate(Request $request) {
        $date = $request->input('date');
    
        if (!$date) {
            // Jika tanggal kosong, ambil semua data reservasi
            $reservasiAll = Reservasi::with(['user', 'dokter'])->get();
        } else {
            // Ambil reservasi berdasarkan tanggal
            $reservasiAll = Reservasi::with(['user', 'dokter'])
                ->whereDate('tanggal', $date)
                ->get();
        }
    
        return view('partials.reservasi_table', compact('reservasiAll'));
    }
    

    public function dataUser(Request $request)
{
    $user = Auth::user(); // User yang sedang login

    // Ambil semua data user dari database
    $dataUsers = User::all(); // Sesuaikan query ini dengan kebutuhanmu, misalnya menambahkan filter

    return view('datauser', compact('user', 'dataUsers'));
}


    public function dataDokter() {  
        $user = Auth::user();  
        $dokters = Dokter::with(['spesialis', 'jadwalDokter'])->get();  
    
        foreach ($dokters as $dokter) {    
            foreach ($dokter->jadwalDokter as $jadwal) {    
                // Debugging: Tampilkan nilai jam_mulai  
                \Log::info('jam_mulai: ' . $jadwal->jam_mulai);  
    
                // Menghitung jam_selesai    
                try {  
                    // Menggunakan format H:i:s untuk mem-parsing jam_mulai  
                    $jamMulai = \Carbon\Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai);    
                    $durasiTindakan = $jadwal->durasi_tindakan; // Misalnya dalam menit    
                    $jamSelesai = $jamMulai->copy()->addMinutes($durasiTindakan);    
                    
                    // Menyimpan jam_selesai dalam objek jadwal  
                    $jadwal->jam_selesai = $jamSelesai->format('H:i'); // Format jam_selesai menjadi H:i  
                    // Mengubah jam_mulai menjadi format H:i  
                    $jadwal->jam_mulai = $jamMulai->format('H:i'); // Format jam_mulai menjadi H:i  
                } catch (\Exception $e) {  
                    \Log::error('Error parsing jam_mulai: ' . $e->getMessage());  
                    $jadwal->jam_selesai = null; // Atau nilai default lainnya  
                }  
            }    
        }  
    
        return view('datadokter', compact('user', 'dokters'));  
    }

    public function cariDokter(Request $request) {  
        $query = $request->input('query');  
      
        $dokters = Dokter::with('spesialis')  
            ->where('nama_dokter', 'LIKE', "%{$query}%")  
            ->orWhereHas('spesialis', function($q) use ($query) {  
                $q->where('nama_spesialis', 'LIKE', "%{$query}%");  
            })  
            ->get();  
      
        return view('partials.dokter_table', compact('dokters'));  
    }  

    public function halamanUtama() {
        return view('halamanutama');
    }

}
