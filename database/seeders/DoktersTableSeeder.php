<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokters')->insert([
            [
                'nama_dokter' => 'Dr. Budi Santoso',
                'id_spesialis' => 1,
                'hari' => 'Senin',
                'no_telepon' => '081122334455',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr. Sari Pertiwi',
                'id_spesialis' => 2,
                'hari' => 'Selasa',
                'no_telepon' => '081133445566',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_dokter' => 'Dr. Andi Wijaya',
                'id_spesialis' => 1,
                'hari' => 'Rabu',
                'no_telepon' => '081144556677',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
