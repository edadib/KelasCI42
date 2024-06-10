<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUser extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('users', ['role' => ['type' => 'varchar', 'constraint'=> '20']]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('users', 'role');
    }
}
