<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField(
            [
                'name' => ['type' => 'varchar', 'constraint' => 255] ,
                'email' => ['type' => 'varchar', 'constraint' => 255] ,
                'password' => ['type' => 'varchar', 'constraint' => 50] ,
                'created_at' => ['type' => 'datetime', 'null' => true] ,
                'updated_at' => ['type' => 'datetime', 'null' => true] ,
            ]
        );
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
