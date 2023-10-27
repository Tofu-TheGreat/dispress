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
            $table->string('nim', 11);
            $table->string('nama', 225);
            $table->enum('level', ['admin', 'officer', 'staff']);
            $table->enum('jabatan', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']);
            $table->string('username', 60);
            $table->string('email', 225)->unique();
            $table->string('foto_user', 225)->nullable();
            $table->string('nomor_telpon', 19)->unique();
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
        Schema::dropIfExists('users');
    }
};
