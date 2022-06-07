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
        Schema::table('peserta', function (Blueprint $table) {
            $table->text('ktp')->nullable();
            $table->text('ijazah')->nullable();
            $table->text('foto')->nullable();
            $table->text('kartu_vaksin')->nullable();
            $table->enum('status_berkas', ['belum', 'sudah'])->default('belum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta', function (Blueprint $table) {
            $table->dropColumn('ktp');
            $table->dropColumn('ijazah');
            $table->dropColumn('foto');
            $table->dropColumn('kartu_vaksin');
            $table->dropColumn('status_berkas');
        });
    }
};
