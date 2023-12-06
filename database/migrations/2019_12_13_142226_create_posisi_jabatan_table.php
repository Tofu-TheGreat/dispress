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
        Schema::create('posisi_jabatan', function (Blueprint $table) {
            $table->id('id_posisi_jabatan');
            $table->string('nama_posisi_jabatan', 100);
            $table->string('deskripsi', 100);
            $table->integer('tingkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posisi_jabatan');
    }
};
