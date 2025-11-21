<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\JWT;

class AuthController extends BaseController
{
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Email atau password salah'
            ])->setStatusCode(401);
        }

        $payload = [
            'id'    => $user['id'],  // WAJIB
            'email' => $user['email'],
            'role'  => $user['role'],
            'iat'   => time(),
            'exp'   => time() + 86400 // expired 1 hari
        ];


        $token = JWT::encode($payload, getenv('JWT_SECRET'), 'HS256');

        return $this->response->setJSON([
            'status' => true,
            'token' => $token
        ]);
    }
}
