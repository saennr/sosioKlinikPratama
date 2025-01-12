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
        return view('datadokter', compact('user'));
    }

    public function halamanUtama() {
        return view('halamanutama');
    }

}
