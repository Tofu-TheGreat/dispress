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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id_surat')->on('surat')->onDelete('cascade');
            $table->unsignedBigInteger('id_klasifikasi'); //Pengirim
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
            $table->string('nomor_agenda', 100);
            $table->enum('status_pengajuan', ['0', '1'])->default('0'); //Belum selesai, Selesai
            $table->date('tanggal_terima');
            $table->string('catatan_pengajuan', 100);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->enum('tujuan_pengajuan', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])->default('0'); //Penerima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan', function (Blueprint $table) {
            $table->dropForeign('id_surat');
            $table->dropIndex('id_surat');
            $table->dropColumn('id_surat');
            $table->dropForeign('id_klasifikasi');
            $table->dropIndex('id_klasifikasi');
            $table->dropColumn('id_klasifikasi');
        });
    }
};
