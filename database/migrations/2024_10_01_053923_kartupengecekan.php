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
        Schema::create('kartupengecekan', function (Blueprint $table) {
            $table->id();
            $table->string('idmuat')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('nopol')->nullable();
            $table->string('security')->nullable();
            $table->string('checker')->nullable();
            $table->string('driver1')->nullable();
            $table->string('driver2')->nullable();
            $table->string('forklift1')->nullable();
            $table->string('forklift2')->nullable();
            $table->time('jammuat')->nullable();
            $table->time('jamselesai')->nullable();
            $table->string('personel1')->nullable();
            $table->string('personel2')->nullable();
            $table->string('personel3')->nullable();
            $table->string('personel4')->nullable();
            $table->float('totbale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartupengecekan');
    }
};
