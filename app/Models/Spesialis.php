<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_spesialis'; // Primary key yang digunakan

    protected $fillable = [
        'nama_spesialis'
    ];

    // Relasi one-to-many dengan model Dokter
    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_spesialis');
    }
}
