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
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->unsignedBigInteger('id_klasifikasi'); //Pengirim
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
            $table->string('nomor_surat', 50);
            $table->date('tanggal_surat');
            $table->string('isi_surat', 100);
            $table->unsignedBigInteger('id_instansi');
            $table->foreign('id_instansi')->references('id_instansi')->on('instansi')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->enum("status_verifikasi", ['0', '1', '2'])->default('0'); //belum diverifikasi, terverifikasi, dikembalikan
            $table->string('catatan_verifikasi', 100); //untuk memberi pesan kepada yang akan memverifikasi atau saat dikembalikan
            $table->string('scan_dokumen', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user');
            $table->dropColumn('id_user');
            $table->softDeletes();
        });
    }
};
