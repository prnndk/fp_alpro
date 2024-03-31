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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('merk');
            $table->string('plat_nomor');
            $table->double('harga');
            $table->string('warna');
            $table->string('kondisi');
            $table->foreignId('tipe_kendaraan_id')->constrained()->onDelete('cascade');
            $table->foreignId('pemilik_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};