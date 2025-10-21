<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait; // ✅ penting untuk respond() dan fail()
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class UserController extends BaseController
{
    use ResponseTrait; // ✅ wajib agar bisa pakai fail(), respond(), dsb.

    protected $model;
    private $key = 'secret_key_adi_salestrack';

    public function __construct()
    {
        $this->model = new UserModel();
    }

    // =====================
    // REGISTER
    // =====================
    public function register()
    {
        $input = $this->request->getJSON();

        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        if ($this->model->where('username', $input->username)->first()) {
            return $this->fail('Username already exists', 409);
        }

        if ($this->model->where('email', $input->email)->first()) {
            return $this->fail('Email already exists', 409);
        }

        $data = [
            'username' => $input->username,
            'email'    => $input->email,
            'password' => password_hash($input->password, PASSWORD_DEFAULT),
            'role'     => $input->role ?? 'user'
        ];

        $this->model->insert($data);

        return $this->respondCreated([
            'status'  => 201,
            'message' => 'User registered successfully'
        ]);
    }

    // =====================
    // LOGIN
    // =====================
    public function login()
    {
        $input = $this->request->getJSON();

        if (!isset($input->username) || !isset($input->password)) {
            return $this->failValidationErrors('Username and password required');
        }

        $user = $this->model->where('username', $input->username)->first();

        if (!$user) {
            return $this->failNotFound('User not found');
        }

        if (!password_verify($input->password, $user['password'])) {
            return $this->fail('Invalid password', 401);
        }

        $payload = [
            'iss'  => base_url(),
            'aud'  => base_url(),
            'iat'  => time(),
            'exp'  => time() + 3600, // 1 jam
            'uid'  => $user['id'],
            'role' => $user['role']
        ];

        $token = JWT::encode($payload, $this->key, 'HS256');

        return $this->respond([
            'status'  => 200,
            'message' => 'Login successful',
            'token'   => $token
        ]);
    }

    // =====================
    // GET ALL USERS (ADMIN ONLY)
    // =====================
    public function index()
    {
        $users = $this->model->findAll();
        return $this->respond([
            'status' => 200,
            'data'   => $users
        ]);
    }

    // =====================
    // PROFILE (JWT)
    // =====================
    public function profile()
    {
        $userData = $this->request->user; // diisi oleh filter JwtAuth
        $user = $this->model->find($userData['uid']);

        if (!$user) {
            return $this->failNotFound('User not found');
        }

        unset($user['password']);

        return $this->respond([
            'status' => 200,
            'data'   => $user
        ]);
    }

    // =====================
    // UPDATE PROFILE (JWT)
    // =====================
    public function updateProfile()
    {
        $input = $this->request->getJSON();
        $userData = $this->request->user;
        $user = $this->model->find($userData['uid']);

        if (!$user) {
            return $this->failNotFound('User not found');
        }

        $updateData = [];

        if (isset($input->username)) {
            $updateData['username'] = $input->username;
        }
        if (isset($input->email)) {
            $updateData['email'] = $input->email;
        }
        if (isset($input->password)) {
            $updateData['password'] = password_hash($input->password, PASSWORD_DEFAULT);
        }

        $this->model->update($userData['uid'], $updateData);

        return $this->respond([
            'status'  => 200,
            'message' => 'Profile updated successfully'
        ]);
    }
}
