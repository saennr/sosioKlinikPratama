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
                'pw' => Hash::make('password123'),
                'no_identitas' => '123456789',
                'tgl_lahir' => '1988-03-14',
                'no_hp' => '08123456789',
                'jk' => 'L',
                'alamat' => 'Jl. Buah Batu No. 94',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstName' => 'Dewi',
                'lastName' => 'Ayu',
                'pw' => Hash::make('password123'),
                'no_identitas' => '987654321',
                'tgl_lahir' => '1992-06-22',
                'no_hp' => '08123456780',
                'jk' => 'P',
                'alamat' => 'Jl. Batununggal No. 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
