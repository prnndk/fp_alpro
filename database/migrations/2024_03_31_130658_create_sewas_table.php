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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->date('tanggal_sewa');
            $table->date('tanggal_perkiraan_kembali');
            $table->double('total_harga');
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->foreignId('kendaraan_id')->constrained('kendaraans')->onDelete('cascade');
            $table->enum('status_sewa',['ditolak','disetujui','selesai','menunggu'])->default('menunggu');
            $table->string('reject_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
