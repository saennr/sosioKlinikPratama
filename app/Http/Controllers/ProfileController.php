<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profileuser', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to home page
    }
}
