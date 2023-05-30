<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'rndbncc',
            'email'=> 'rnd@bncc.net',
            'password' =>bcrypt('ThePowerOfAdmin2023'),
            'isAdmin'=> true,
        ]);
    }
}
