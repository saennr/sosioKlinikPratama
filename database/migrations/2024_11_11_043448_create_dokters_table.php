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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter');
            $table->unsignedBigInteger('id_spesialis');
            $table->string('hari');
            $table->string('no_telepon');
            $table->timestamps();
            $table->string('img_url');

            // Foreign key constraint
            $table->foreign('id_spesialis')->references('id_spesialis')->on('spesialis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
