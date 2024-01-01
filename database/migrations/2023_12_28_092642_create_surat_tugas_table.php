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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id('id_surat_tugas');
            $table->unsignedBigInteger('id_klasifikasi');
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
            $table->string('nomor_surat_tugas', 50);
            $table->unsignedBigInteger('id_user'); //Pengirim
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->text('dasar');
            $table->json('id_user_penerima'); //penerima
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('tujuan_pelaksanaan');
            $table->text('tempat_pelaksanaan');
            $table->text('tembusan');
            $table->timestamps();
            // $table->string('lokasi_surat_tugas', 100); //penggunaan sebagai dimana surat dikeluarkan contohnya dalam ((Tangerang)), 12 Oktober 2023
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas', function (Blueprint $table) {
            $table->dropForeign('id_klasifikasi');
            $table->dropIndex('id_klasifikasi');
            $table->dropColumn('id_klasifikasi');
            $table->dropForeign('id_user');
            $table->dropIndex('id_user');
            $table->dropColumn('id_user');
        });
    }
};
