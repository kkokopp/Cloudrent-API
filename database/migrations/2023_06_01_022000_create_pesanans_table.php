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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->foreignId('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
            $table->time('waktu_pengambilan');
            $table->date('tanggal_rental_mulai');
            $table->date('tanggal_rental_selesai');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('total');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('no_hp');
            $table->foreignId('status_id')->references('id')->on('pesanan_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
