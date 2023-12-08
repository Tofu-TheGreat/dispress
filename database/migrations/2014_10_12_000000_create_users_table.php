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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nip', 18)->unique();
            $table->string('nama', 225);
            $table->enum('level', ['admin', 'officer', 'staff']);
            $table->unsignedBigInteger('id_posisi_jabatan');
            $table->foreign('id_posisi_jabatan')->references('id_posisi_jabatan')->on('posisi_jabatan')->onDelete('cascade');
            $table->string('username', 60);
            $table->string('email', 225)->unique();
            $table->string('foto_user', 225)->nullable();
            $table->string('nomor_telpon', 13)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_posisi_jabatan']);
        });

        Schema::dropIfExists('users');
    }
};
