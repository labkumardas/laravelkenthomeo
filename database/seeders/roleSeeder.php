<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            ['id' => 1 ,'name' => 'admin' ],
            ['id' => 2 ,'name' => 'user'],
         ];

        // Insert data into the table
        DB::table('roles')->insert($data);
    }
}
