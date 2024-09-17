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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('riwayat', 50);
            $table->string('sekolah_asal', 50);
            $table->string('status_sekolah', 50);
            $table->string('jarak_tempuh', 50);
            $table->string('alasan_masuk_pondok', 50);
            $table->string('beasiswa', 50);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
