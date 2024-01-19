<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([
           [         
            'name' => 'admin',
            'user_name' => 'admin user',
            'email' => 'admin@edu.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('password123'), 
           ],
           [         
            'name' => 'vendor',
            'user_name' => 'vendor user',
            'email' => 'vendor@edu.com',
            'role' => 'vendor',
            'status' => 'active',
            'password' => bcrypt('password321'), 
           ],
           [         
            'name' => 'user',
            'user_name' => 'user',
            'email' => 'user@edu.com',
            'role' => 'user',
            'status' => 'active',
            'password' => bcrypt('password123'), 
           ],
        ]);
    }
}
