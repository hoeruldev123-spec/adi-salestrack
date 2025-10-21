<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'       => 'PT Nusantara Jaya',
                'address'    => 'Jl. Merdeka No.123, Jakarta',
                'phone'      => '081234567890',
                'email'      => 'info@nusantarajaya.com',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'CV Sinar Abadi',
                'address'    => 'Jl. Sudirman No.45, Bandung',
                'phone'      => '081987654321',
                'email'      => 'admin@sinarabadi.co.id',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'PT Teknologi Indonesia',
                'address'    => 'Jl. Soekarno Hatta No.88, Surabaya',
                'phone'      => '082233445566',
                'email'      => 'contact@teknoindonesia.id',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Masukkan ke tabel customers
        $this->db->table('customers')->insertBatch($data);
    }
}
