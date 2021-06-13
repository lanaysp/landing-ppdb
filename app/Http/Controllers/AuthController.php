<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return $this->masuk();
    }

    public function forget()
    {
        return $this->reset();
    }

}
