<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_tagihan_peserta_table.php
    public function up()
    {
        Schema::create('tagihan_peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_bpjs_id')->constrained('peserta_bpjs')->onDelete('cascade');
            $table->decimal('pembayaran', 10, 2);
            $table->string('channel');
            $table->date('tanggal_jatuh_tempo');
            $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_peserta');
    }
};
