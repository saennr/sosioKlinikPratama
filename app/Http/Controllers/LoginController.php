<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function beranda(Request $request)
{
    // Validasi input email dan password
    $request->validate([
        'email' => 'required|email', // Menambahkan validasi format email
        'password' => 'required|min:6', // Menambahkan minimal panjang password
    ]);

    // Mengambil data email dan password dari request
    $credentials = $request->only('email', 'password');

    // Mencoba login menggunakan data yang diberikan
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Login berhasil
        return view('halamanutama');
    } else {
        // Login gagal
        return redirect()->route('login')->withErrors([
            'login_failed' => 'Email atau Password salah',
        ]);
    }
}

    public function register() {
        return view('daftar');
    }

    public function register_proses(Request $request) {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'pw' => 'required|min:8',
            'no_hp' => 'required|string|max:15',
            'no_identitas' => 'required|string|max:20|unique:users,no_identitas',
            'tgl_lahir' => 'required|date',
        ]);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data pendaftar
        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['pw'] = Hash::make($request->pw);
        $data['no_hp'] = $request->no_hp;
        $data['no_identitas'] = $request->no_identitas;
        $data['tgl_lahir'] = $request->tgl_lahir;

        // Buat user baru
        User::create($data);

        // Redirect atau tampilkan view setelah pendaftaran berhasil
        return view('login');
    }
}
