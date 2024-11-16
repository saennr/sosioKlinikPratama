<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstName' => 'Ali',
                'lastName' => 'Mahendra',
                'email' => 'ali@example.com',
                'pw' => Hash::make('password123'),
                'no_identitas' => '123456789',
                'tgl_lahir' => '1988-03-14',
                'no_hp' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstName' => 'Dewi',
                'lastName' => 'Ayu',
                'email' => 'dewi@example.com',
                'pw' => Hash::make('password123'),
                'no_identitas' => '987654321',
                'tgl_lahir' => '1992-06-22',
                'no_hp' => '08123456780',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
