<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spesialis')->insert([
            [
                'id_spesialis' => 1,
                'nama_spesialis' => 'umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_spesialis' => 2,
                'nama_spesialis' => 'gigi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
