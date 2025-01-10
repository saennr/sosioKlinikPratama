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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('pw');
            $table->string('no_identitas')->unique();
            $table->date('tgl_lahir');
            $table->string('no_hp');
            $table->string('jk', 1);
            $table->string('alamat');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
