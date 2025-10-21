<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_code' => 'PRD001',
                'name'         => 'Software License - ADI POS',
                'price'        => 5000000,
                'stock'        => 10,
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'product_code' => 'PRD002',
                'name'         => 'Hardware - Thermal Printer',
                'price'        => 1500000,
                'stock'        => 25,
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'product_code' => 'PRD003',
                'name'         => 'Cloud Service - ADI Analytics',
                'price'        => 2500000,
                'stock'        => 50,
                'created_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
