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

            $table->time('waktu_berakhir')->nullable();
            $table->string('judul')->nullable();
            $table->unsignedBigInteger('nomor_peserta')->nullable();

            $table->foreign('nomor_peserta')
                ->references('nomor_peserta')
                ->on('peserta')
                ->onDelete('set null')
                ->cascadeOnUpdate();
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
            $table->dropForeign(['nomor_peserta']);
            $table->dropColumn('waktu_berakhir');
            $table->dropColumn('judul');
            $table->dropColumn('nomor_peserta');
        });
    }
};
