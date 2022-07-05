<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_pelatihan', function (Blueprint $table) {
            $table->dropForeign(['nomor_peserta']);
            $table->dropColumn('nomor_peserta');
            $table->dropColumn('paket');
            $table->text('materi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_pelatihan', function (Blueprint $table) {
            $table->unsignedBigInteger('nomor_peserta')->nullable();
            $table->foreign('nomor_peserta')
                ->references('nomor_peserta')
                ->on('peserta')
                ->onDelete('set null')
                ->cascadeOnUpdate();
            $table->string('paket')->nullable();
            $table->dropColumn('materi');
        });
    }
};
