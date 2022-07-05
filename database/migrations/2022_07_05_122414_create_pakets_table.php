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
        Schema::create('paket', function (Blueprint $table) {
            $table->id('id_paket');
            $table->timestamps();
            $table->string('tahun');
            $table->unsignedBigInteger('id_kejuruan');
            $table->unsignedTinyInteger('paket');
            $table->date('tanggal_daftar_mulai');
            $table->date('tanggal_daftar_selesai');
            $table->text('keterangan')->nullable();

            $table->foreign('id_kejuruan')->references('id_kejuruan')->on('kejuruan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
};
