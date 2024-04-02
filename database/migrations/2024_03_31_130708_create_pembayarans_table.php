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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('bukti_pembayaran');
            $table->string('pembayaran_via', 40);
            $table->enum('type_pembayaran', ['dp', 'pelunasan','denda']);
            $table->double('jumlah_dibayarkan');
            $table->foreignId('sewa_id')->constrained()->onDelete('cascade');
            $table->enum('status_pembayaran', ['revisi', 'diterima', 'ditolak']);
            $table->string('reject_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
