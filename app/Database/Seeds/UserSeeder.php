<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'salesuser',
                'email'    => 'sales@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'sales',
            ],
            [
                'username' => 'financeuser',
                'email'    => 'finance@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'finance',
            ],
            [
                'username' => 'management',
                'email'    => 'management@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role'     => 'management',
            ],
        ];

        // Insert batch
        $this->db->table('users')->insertBatch($data);
    }
}
