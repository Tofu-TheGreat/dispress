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
        Schema::create('web_setting', function (Blueprint $table) {
            $table->id('id_web_setting');
            $table->unsignedBigInteger('id_instansi');
            $table->foreign('id_instansi')->references('id_instansi')->on('instansi')->onDelete('cascade');
            $table->unsignedBigInteger('id_ketua');
            $table->foreign('id_ketua')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('default_logo', 225)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_setting', function (Blueprint $table) {
            $table->dropForeign('id_instansi');
            $table->dropIndex('id_instansi');
            $table->dropColumn('id_instansi');
            $table->dropForeign('id_ketua');
            $table->dropIndex('id_ketua');
            $table->dropColumn('id_ketua');
        });
    }
};
