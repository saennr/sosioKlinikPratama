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
                'nama_dokter' => 'dr. Suwondo Ardi Nugroho',
                'id_spesialis' => 1,
                'hari' => '(Senin - Rabu)',
                'no_telepon' => '081122334455',
                'created_at' => now(),
                'updated_at' => now(),
                'img_url' => 'lg/img/dr. Suwando Ardi Nugroho.jpg',
            ],
            [
                'nama_dokter' => 'dr. Yeni Mulyani, MMRS',
                'id_spesialis' => 1,
                'hari' => '(Kamis - Jumat)',
                'no_telepon' => '081122334455',
                'created_at' => now(),
                'updated_at' => now(),
                'img_url' => 'lg/img/dr. yeni.jpg',
            ],
            [
                'nama_dokter' => 'dr. Diny Febriany H, MMRS',
                'id_spesialis' => 1,
                'hari' => '(Senin - Selasa)',
                'no_telepon' => '081122334455',
                'created_at' => now(),
                'updated_at' => now(),
                'img_url' => 'lg/img/',
            ],
            [
                'nama_dokter' => 'drg. Nina Ayu Pebriana',
                'id_spesialis' => 2,
                'hari' => '(Senin - Kamis)',
                'no_telepon' => '081133445566',
                'created_at' => now(),
                'updated_at' => now(),
                'img_url' => 'lg/img/',
            ],
        ]);
    }
}
