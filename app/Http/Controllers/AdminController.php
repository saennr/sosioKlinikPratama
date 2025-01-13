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
        
        // Get today's date
        $today = now()->toDateString();
        
        // Count patients registered today
        $jumlahPasien = Reservasi::whereDate('tanggal', $today)->count();
        
        // Fetch reservations for today with related user and dokter information
        $reservasiHariIni = Reservasi::whereDate('tanggal', $today)
            ->with(['user', 'dokter']) // Eager load related models
            ->orderBy('no_antrian', 'asc') // Optional: order by queue number
            ->get();
        
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

    public function filterReservasi(Request $request)  
    {  
        $option = $request->input('option');  
        $date = $request->input('date');  
        $today = Carbon::today()->toDateString(); // Mengambil tanggal hari ini dalam format Y-m-d  
    
        \Log::info('Opsi yang dipilih: ' . $option);  
        \Log::info('Tanggal yang dipilih: ' . $date);  
        \Log::info('Tanggal hari ini: ' . $today);  
    
        if ($option) {  
            switch ($option) {  
                case 'Reservasi Aktif':  
                    $reservasi = Reservasi::where('tanggal', '>=', $today)->get();  
                    break;  
    
                case 'Riwayat':  
                    $reservasi = Reservasi::where('tanggal', '<', $today)->get();  
                    break;  
    
                case 'Semua Reservasi':  
                    $reservasi = Reservasi::all();  
                    break;  
    
                default:  
                    $reservasi = Reservasi::all();  
                    break;  
            }  
        } elseif ($date) {  
            // Jika ada filter berdasarkan tanggal  
            $reservasi = Reservasi::where('tanggal', $date)->get();  
        } else {  
            // Jika tidak ada filter, ambil semua reservasi  
            $reservasi = Reservasi::all();  
        }  
    
        // Debug log untuk melihat data yang diambil  
        \Log::info('Data reservasi untuk opsi: ' . $option, $reservasi->toArray());  
    
        return view('partials.reservasi_table', ['reservasiAll' => $reservasi]);  
    }  
  

    public function deleteReservasi($id_reservasi) {  
        $reservasi = Reservasi::findOrFail($id_reservasi);  
        $reservasi->delete();  
  
        return response()->json(['success' => 'Reservasi berhasil dihapus']);  
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


public function deleteUser($id_user)
{
    try {
        $user = User::findOrFail($id_user); // Temukan user berdasarkan ID
        $user->delete(); // Hapus user
        return response()->json(['success' => 'User berhasil dihapus.']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Terjadi kesalahan saat menghapus user.'], 500);
    }
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
