<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\Services;

class JwtAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return Services::response()->setJSON([
                'error' => 'Token required'
            ])->setStatusCode(401);
        }

        $token = str_replace('Bearer ', '', $authHeader);

        try {
            $decoded = JWT::decode($token, new Key(getenv('JWT_SECRET'), 'HS256'));
        } catch (\Exception $e) {
            return Services::response()->setJSON([
                'error' => 'Invalid Token',
                'message' => $e->getMessage()
            ])->setStatusCode(401);
        }

        // ROLE CHECK
        if ($arguments && !in_array($decoded->role, $arguments)) {
            return Services::response()->setJSON([
                'error' => 'Access Denied'
            ])->setStatusCode(403);
        }

        // simpan user
        $request->user = $decoded;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing
    }
}
