<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JanjiController extends Controller
{
    public function janji() {
        return view('janji');
    }
}
