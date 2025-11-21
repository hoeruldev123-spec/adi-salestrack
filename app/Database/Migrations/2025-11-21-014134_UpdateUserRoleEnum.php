<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserRoleEnum extends Migration
{
    public function up()
    {
        // Update ENUM role
        $this->db->query("
            ALTER TABLE users 
            MODIFY COLUMN role 
            ENUM('admin', 'sales', 'finance', 'management') 
            NOT NULL DEFAULT 'sales';
        ");
    }

    public function down()
    {
        $this->db->query("
            ALTER TABLE `users`
            CHANGE `role` `role`
            ENUM('admin','sales')
            NOT NULL DEFAULT 'sales';
        ");
    }

}
