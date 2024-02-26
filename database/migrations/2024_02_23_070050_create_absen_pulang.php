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
        Schema::create('absen_pulang', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('status');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_pulang');
    }
};
