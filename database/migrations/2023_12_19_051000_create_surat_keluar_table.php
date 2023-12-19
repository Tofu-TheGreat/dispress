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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id('id_surat_keluar');
            $table->unsignedBigInteger('id_klasifikasi'); //Pengirim
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
            $table->string('nomor_surat_keluar', 50);
            $table->date('tanggal_surat_keluar');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_instansi');
            $table->foreign('id_instansi')->references('id_instansi')->on('instansi')->onDelete('cascade');
            $table->unsignedBigInteger('id_instansi_penerima');
            $table->foreign('id_instansi_penerima')->references('id_instansi')->on('instansi')->onDelete('cascade');
            $table->string('perihal', 50);
            $table->text('isi_surat');
            $table->string('tembusan', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
