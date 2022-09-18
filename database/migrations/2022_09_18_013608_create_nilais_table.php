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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->unsignedBigInteger('nomor_peserta');
            $table->foreign('nomor_peserta')
                ->references('nomor_peserta')
                ->on('peserta')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->unsignedBigInteger('id_paket');
            $table->foreign('id_paket')->references('id_paket')->on('paket')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->float('nilai_sikap_rerata', 5, 2, true);
            $table->float('nilai_sikap_bobot', 3, 2, true)->default(0.4)->comment("dalam %");
            
            $table->float('nilai_akademis_rerata', 5, 2, true);
            $table->float('nilai_akademis_bobot', 3, 2, true)->default(0.6)->comment("dalam %");
            
            $table->unsignedSmallInteger('ranking')->nullable();

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
        Schema::dropIfExists('nilai');
    }
};
