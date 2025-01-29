<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dokter'; // Primary key yang digunakan

    protected $fillable = [
        'nama_dokter',
        'id_spesialis',
        'hari',
        'no_telepon',
        'img_url',
    ];

    // Relasi many-to-one dengan model Spesialis
    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'id_spesialis');
    }

    // Relasi one-to-many dengan model JadwalDokter
    public function jadwalDokter()
    {
        return $this->hasMany(JadwalDokter::class, 'id_dokter');
    }
}
