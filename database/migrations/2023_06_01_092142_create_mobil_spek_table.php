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
        Schema::create('mobil_spek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
            $table->foreignId('spek_id')->references('id')->on('speks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil_spek');
    }
};
