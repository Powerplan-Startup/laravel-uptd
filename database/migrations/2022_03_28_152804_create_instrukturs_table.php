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
        Schema::create('instruktur', function (Blueprint $table) {
            $table->id('nip');
            /**
             * nama, jenis kelamin, alamat, no_hp, materi
             * 
             */
            $table->string('nama', 30);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('alamat', 20);
            $table->string('no_hp', 12);
            $table->text('materi');

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
        Schema::dropIfExists('instruktur');
    }
};
