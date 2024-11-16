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
                'id_dokter' => 5,
                'nama_jadwal' => 'Senin Pagi',
                'hari' => 'Monday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 5,
                'nama_jadwal' => 'Selasa Pagi',
                'hari' => 'Tuesday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 5,
                'nama_jadwal' => 'Rabu Pagi',
                'hari' => 'Wednesday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 5,
                'nama_jadwal' => 'Rabu Siang',
                'hari' => 'Wednesday',
                'jam_mulai' => '13:00:00',
                'durasi_tindakan' => 120, // 120 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 6,
                'nama_jadwal' => 'Kamis Pagi',
                'hari' => 'Thursday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 240, // 240 menit = 2 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 6,
                'nama_jadwal' => 'Kamis Siang',
                'hari' => 'Thursday',
                'jam_mulai' => '13:00:00',
                'durasi_tindakan' => 120, // 120 menit = 2 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 6,
                'nama_jadwal' => 'Jumat Pagi',
                'hari' => 'Friday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 240, // 240 menit = 2 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 6,
                'nama_jadwal' => 'Jumat Siang',
                'hari' => 'Friday',
                'jam_mulai' => '13:00:00',
                'durasi_tindakan' => 120, // 120 menit = 2 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 7,
                'nama_jadwal' => 'Senin Siang',
                'hari' => 'Monday',
                'jam_mulai' => '11:00:00',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 7,
                'nama_jadwal' => 'Selasa Siang',
                'hari' => 'Tuesday',
                'jam_mulai' => '11:00:00',
                'durasi_tindakan' => 240, // 240 menit = 4 jam
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 8,
                'nama_jadwal' => 'Senin Pagi',
                'hari' => 'Monday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 270,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 8,
                'nama_jadwal' => 'Selasa Pagi',
                'hari' => 'Tuesday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 270,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 8,
                'nama_jadwal' => 'Rabu Pagi',
                'hari' => 'Wednesday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 270,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_dokter' => 8,
                'nama_jadwal' => 'Kamis Pagi',
                'hari' => 'Thursday',
                'jam_mulai' => '07:30:00',
                'durasi_tindakan' => 270,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
