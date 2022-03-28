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
        Schema::create('kejuruan', function (Blueprint $table) {
            $table->id();
            /**
             * nama_kejuruan, paket, id_jadwal
             * 
             */
            $table->string('nama_kejuruan', 30);
            $table->unsignedBigInteger('paket')->nullable();
            $table->unsignedBigInteger('id_jadwal');

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
        Schema::dropIfExists('kejuruan');
    }
};
