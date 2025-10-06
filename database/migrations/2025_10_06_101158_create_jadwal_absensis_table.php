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
        Schema::create('jadwal_absensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jadwal'); // contoh: Pagi, Siang, Sore
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->json('hari')->nullable(); // ['Senin', 'Selasa', ...]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_absensis');
    }
};
