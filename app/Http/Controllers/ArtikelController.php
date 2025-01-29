<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function artikel1() {
        return view('detailinformasi');
    }

    public function artikel2() {
        return view('detailinformasi2');
    }
    
    public function artikel3() {
        return view('detailinformasi3');
    }
}
