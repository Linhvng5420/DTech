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
        Schema::create('screen', function (Blueprint $table) {
            $table->id();
            $table->string('TenSP');
            $table->string('HinhAnh')->nullable();
            $table->string('MauSac');
            $table->integer('Gia');
            $table->integer('KichThuoc')->nullable();
            $table->string('MieuTa')->nullable();
            $table->string('Hang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen');
    }
};
