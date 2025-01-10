<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileStaffController extends Controller
{
    public function profileStaff() {
        return view('profilestaf');
    }
}
