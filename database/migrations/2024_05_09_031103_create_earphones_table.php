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
        Schema::create('earphones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('MaSP');
            $table->string('TenSP');
            $table->string('MauSac');
            $table->integer('Gia');
            $table->text('MieuTa')->nullable(); // cho phép null
            $table->string('HinhAnh')->nullable(); // cho phép null
            $table->string('Hang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earphones');
    }
};
