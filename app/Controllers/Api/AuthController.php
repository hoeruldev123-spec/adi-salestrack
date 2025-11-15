<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
         return $this->response->setJSON([
            'status' => 200,
            'message' => 'Login OK',
            'token' => 'example-jwt-token'
        ]);
    }
}
