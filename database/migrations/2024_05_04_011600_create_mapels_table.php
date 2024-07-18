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
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('dosen_pengajar');
            $table->string('nama_matkul');
            $table->foreign('id_kelas')->references('id')->on('kelass');
            $table->foreign('dosen_pengajar')->references('id')->on('dosens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
