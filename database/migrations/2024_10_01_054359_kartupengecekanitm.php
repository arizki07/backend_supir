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
        Schema::create('kartupengecekanitm', function (Blueprint $table) {
            $table->id();
            $table->string('id_muat')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('nama')->nullable();
            $table->string('lot')->nullable();
            $table->string('jenis')->nullable();
            $table->float('val_jenis')->nullable();
            $table->float('bale')->nullable();
            $table->float('cones')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartupengecekanitm');
    }
};
