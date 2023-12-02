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
        Schema::create('ajukan', function (Blueprint $table) {
            $table->id('id_ajukan');
            $table->unsignedBigInteger('id_klasifikasi'); //Pengirim
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
            $table->string('nomor_agenda', 100);
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id_surat')->on('surat')->onDelete('cascade');
            $table->date('tanggal_terima');
            $table->enum('tujuan_ajuan', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])->default('0'); //Penerima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajukan', function (Blueprint $table) {
            $table->dropForeign('id_surat');
            $table->dropIndex('id_surat');
            $table->dropColumn('id_surat');
            $table->dropForeign('id_klasifikasi');
            $table->dropIndex('id_klasifikasi');
            $table->dropColumn('id_klasifikasi');
        });
    }
};
