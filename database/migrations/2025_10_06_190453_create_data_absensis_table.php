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
        Schema::create('data_absensis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('status')->default('hadir'); // status absen
            $table->date('tanggal'); // hari absen
            $table->time('jam'); // jam absen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_absensis');
    }
};
