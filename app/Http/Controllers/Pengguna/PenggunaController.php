<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
