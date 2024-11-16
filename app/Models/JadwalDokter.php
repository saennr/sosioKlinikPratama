<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jadwal_dokter'; // Primary key yang digunakan

    protected $fillable = [
        'id_dokter',
        'nama_jadwal',
        'hari',
        'jam_mulai',
        'durasi_tindakan'
    ];

    // Relasi many-to-one dengan model Dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
