<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'reservasi';

    // Primary key tabel
    protected $primaryKey = 'id_reservasi';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_user',
        'id_dokter',
        'id_jadwal_dokter',
        'keluhan',
        'tanggal',
        'no_antrian',
        'estimasi_mulai',
        'estimasi_selesai',
    ];

    // Format untuk kolom tanggal dan waktu
    protected $casts = [
        'tanggal' => 'date',
        'estimasi_mulai' => 'datetime:H:i:s',
        'estimasi_selesai' => 'datetime:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function jadwalDokter()
    {
        return $this->belongsTo(JadwalDokter::class, 'id_jadwal_dokter', 'id_jadwal_dokter');
    }

}

