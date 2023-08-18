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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode_mobil')->unique();
            $table->string('brand');
            $table->string('harga');
            // $table->string('status');
            $table->string('mesin');
            $table->string('bahan_bakar');
            $table->string('transmisi');
            $table->string('seat');
            $table->date('tanggal_tersedia')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
