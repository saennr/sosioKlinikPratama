<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;  
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

    //tambah jadwal dokter
public function tambahJadwal(Request $request)
{
    $validatedData = $request->validate([
        'id_dokter' => 'required|exists:dokters,id_dokter', // Validasi ID dokter
        'nama_jadwal' => 'required|string',
        'hari' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i',
        'durasi_tindakan' => 'required|integer|min:1'
    ]);

    try {
        // Hitung jam selesai
        $jamMulai = Carbon::createFromFormat('H:i', $validatedData['jam_mulai']);
        $jamSelesai = $jamMulai->copy()->addMinutes($validatedData['durasi_tindakan']);

        // Buat jadwal dokter baru
        $jadwal = JadwalDokter::create([
            'id_dokter' => $validatedData['id_dokter'],
            'nama_jadwal' => $validatedData['nama_jadwal'],
            'hari' => $validatedData['hari'],
            'jam_mulai' => $validatedData['jam_mulai'],
            'jam_selesai' => $jamSelesai->format('H:i'),
            'durasi_tindakan' => $validatedData['durasi_tindakan']
        ]);

        return response()->json([
            'message' => 'Jadwal dokter berhasil ditambahkan',
            'jadwal' => $jadwal
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Gagal menambahkan jadwal dokter',
            'error' => $e->getMessage()
        ], 500);
    }
}
    

    public function dataUser(Request $request)
{
    $user = Auth::user(); // User yang sedang login

    // Ambil semua data user dari database
    $dataUsers = User::all(); // Sesuaikan query ini dengan kebutuhanmu, misalnya menambahkan filter

    return view('datauser', compact('user', 'dataUsers'));
}

public function updateUser (Request $request, $id_user)
{
    try {
        // Validate the incoming request
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'jk' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
            'pw' => 'nullable|min:8'
        ]);

        // Find the user
        $user = User::findOrFail($id_user);

        // Update user data
        $user->firstName = $validatedData['firstName'];
        $user->lastName = $validatedData['lastName'] ?? $user->lastName;
        $user->tgl_lahir = $validatedData['tgl_lahir'];
        $user->no_hp = $validatedData['no_hp'];
        $user->jk = $validatedData['jk'];
        $user->alamat = $validatedData['alamat'];

        // Update password if provided
        if (!empty($validatedData['pw'])) {
            $user->pw = Hash::make($validatedData['pw']);
        }

        // Save the updates
        $user->save();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'User  updated successfully',
            'user' => $user
        ]);

    } catch (\Exception $e) {
        // Return error response
        return response()->json([
            'success' => false,
            'message' => 'Error updating user: ' . $e->getMessage()
        ], 500);
    }
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

    public function destroy($id_dokter)
{
    $dokter = Dokter::find($id_dokter);
    
    if ($dokter) {
        $dokter->delete();
        return response()->json(['success' => 'Dokter berhasil dihapus.']);
    } else {
        return response()->json(['error' => 'Dokter tidak ditemukan.'], 404);
    }
}

public function tambahDokter(Request $request)
{
    \Log::info('Tambah Dokter Request:', $request->all());

    // dd($request->all());

    try {
        $validatedData = $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'id_spesialis' => 'required|in:1,2',
            'hari' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20'
        ]);

        $dokter = new Dokter();
        $dokter->nama_dokter = $validatedData['nama_dokter'];
        $dokter->id_spesialis = $validatedData['id_spesialis'];
        $dokter->hari = $validatedData['hari'];
        $dokter->no_telepon = $validatedData['no_telepon'];
        $dokter->save();

        return response()->json([
            'success' => true,
            'message' => 'Dokter berhasil ditambahkan'
        ], 200);
    } catch (\Exception $e) {
        \Log::error('Tambah Dokter Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Gagal menambahkan dokter: ' . $e->getMessage()
        ], 500);
    }
}

//delete jadwal dokter
public function destroyJadwal($id_jadwal_dokter)
{
    $jadwal = JadwalDokter::find($id_jadwal_dokter);
    
    if ($jadwal) {
        $jadwal->delete();
        return response()->json(['success' => 'Jadwal dokter berhasil dihapus.']);
    } else {
        return response()->json(['error' => 'Jadwal dokter tidak ditemukan.'], 404);
    }
}

    public function halamanUtama() {
        return view('halamanutama');
    }

}
