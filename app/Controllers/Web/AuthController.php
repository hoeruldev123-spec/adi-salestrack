<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }
}
