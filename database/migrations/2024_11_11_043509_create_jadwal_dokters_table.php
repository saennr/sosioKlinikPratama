<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_dokters', function (Blueprint $table) {
            $table->id('id_jadwal_dokter');
            $table->unsignedBigInteger('id_dokter');
            $table->string('nama_jadwal');
            $table->integer('durasi_tindakan');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_dokters');
    }
};
