<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Ahmad', 'email' => 'ahmad@usm.my', 'password' => '1234',
            ],
            [
                'name' => 'Abu', 'email' => 'abu@usm.my', 'password' => '1234',
            ],
            [
                'name' => 'Ali', 'email' => 'ali@usm.my', 'password' => '1234',
            ],
            [
                'name' => 'Ramli', 'email' => 'ramli@usm.my', 'password' => '1234',
            ],
        ];

        foreach($users as $users)
        {
            $this->db->table('users')->insert($users);
        }
    }
}
