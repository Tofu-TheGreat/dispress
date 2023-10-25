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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id('id_disposisi');
            $table->unsignedBigInteger('id_surat');
            $table->foreign('id_surat')->references('id_surat')->on('surat')->onDelete('cascade');
            $table->date('tanggal_disposisi');
            $table->string('catatan_disposisi', 225);
            $table->enum('status_disposisi', ['0', '1']);
            $table->string('pengirim_disposisi', 100);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi', function (Blueprint $table) {
            $table->dropForeign('id_surat');
            $table->dropIndex('id_surat');
            $table->dropColumn('id_surat');
        });
    }
};
