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
 

    public function dataUser() {
        $user = Auth::user();
        return view('datauser', compact('user'));
    }

    public function dataDokter() {
        $user = Auth::user();
        return view('datadokter', compact('user'));
    }

    public function halamanUtama() {
        return view('halamanutama');
    }

}
