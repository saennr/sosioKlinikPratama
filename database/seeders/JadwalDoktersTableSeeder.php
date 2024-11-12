<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalDoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_dokters')->insert([
            [
                'id_dokter' => 1,
                'nama_jadwal' => 'Senin Pagi',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 2,
                'nama_jadwal' => 'Selasa Siang',
                'durasi_tindakan' => 120, // 120 menit = 2 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 3,
                'nama_jadwal' => 'Rabu Pagi',
                'durasi_tindakan' => 180, // 180 menit = 3 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
