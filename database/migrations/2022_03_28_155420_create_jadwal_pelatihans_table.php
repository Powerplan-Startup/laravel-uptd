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
        Schema::create('jadwal_pelatihan', function (Blueprint $table) {
            $table->id('id_jadwal');
            /**
             * hari, tanggal, waktu, materi, nama_kejuruan, nip
             * 
             */
            $table->string('hari', 10);
            $table->date('tanggal', 10);
            $table->time('waktu');
            $table->text('materi');
            $table->string('nama_kejuruan', 30);
            $table->string('nip', 18);

            /**
             * Foreign Key
             * 
             */
            $table->foreign('nip')
                ->references('nip')
                ->on('instruktur')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelatihan');
    }
};
