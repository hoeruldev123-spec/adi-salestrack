<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'email'      => 'admin@adisalestrack.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'sales01',
                'email'      => 'sales01@adisalestrack.com',
                'password'   => password_hash('sales123', PASSWORD_DEFAULT),
                'role'       => 'sales',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'manager',
                'email'      => 'manager@adisalestrack.com',
                'password'   => password_hash('manager123', PASSWORD_DEFAULT),
                'role'       => 'manager',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
