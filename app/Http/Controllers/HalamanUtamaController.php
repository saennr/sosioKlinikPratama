<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class HalamanUtamaController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // Menerapkan middleware auth
    }
    public function beranda() {
        return view('halamanutama');
    }
}
