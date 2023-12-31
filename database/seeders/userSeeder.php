<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1 ,'name' => 'admin' , 'email'=>'admin@gmail.com', 'role_id'=>1 , 'password'=>Hash::make(12345678)],
            ['id' => 2 ,'name' => 'user' , 'email'=>'user@gmail.com', 'role_id'=>2 , 'password'=>Hash::make(12345678)],
         ];

        // Insert data into the table
        DB::table('users')->insert($data);
    }
}
