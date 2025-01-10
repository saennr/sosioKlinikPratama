<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profileuser', compact('user'));
    }

    public function update(Request $request)
    {   
        // dd($request->all());    
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Validasi data yang diterima
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'no_identitas' => 'required|string|max:20',
            'no_hp' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'jk_hidden' => 'required|string|max:1',
            'alamat' => 'required|string|max:255',
        ]);

        // Perbarui data pengguna
        $user->firstName = $validatedData['firstName'];
        $user->lastName = $validatedData['lastName'];
        $user->no_identitas = $validatedData['no_identitas'];
        $user->no_hp = $validatedData['no_hp'];
        $user->tgl_lahir = $validatedData['tgl_lahir'];
        $user->jk = $validatedData['jk_hidden'];
        $user->alamat = $validatedData['alamat'];

        // Simpan perubahan ke database
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('profileuser')->with('success', 'Profil berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to home page
    }
}
