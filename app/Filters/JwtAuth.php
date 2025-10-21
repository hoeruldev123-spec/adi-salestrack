<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class JwtAuth implements FilterInterface
{
    private $key = 'secret_key_adi_salestrack'; // harus sama dengan di UserController

    public function before(RequestInterface $request, $arguments = null)
    {
        $header = $request->getHeaderLine('Authorization');

        if (!$header) {
            return service('response')->setJSON([
                'status' => 401,
                'message' => 'Authorization header missing'
            ])->setStatusCode(401);
        }

        if (!preg_match('/Bearer\s(\S+)/', $header, $matches)) {
            return service('response')->setJSON([
                'status' => 401,
                'message' => 'Bearer token not found'
            ])->setStatusCode(401);
        }

        $token = $matches[1];

        try {
            $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
            // Simpan data user di request
            $request->user = (array)$decoded;

            // Cek role jika disertakan di argumen
            if ($arguments && isset($arguments[0])) {
                $roleRequired = $arguments[0];
                if ($decoded->role != $roleRequired) {
                    return service('response')->setJSON([
                        'status' => 403,
                        'message' => 'Access denied'
                    ])->setStatusCode(403);
                }
            }
        } catch (\Exception $e) {
            return service('response')->setJSON([
                'status' => 401,
                'message' => 'Invalid or expired token',
                'error' => $e->getMessage()
            ])->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu apa-apa
    }
}
