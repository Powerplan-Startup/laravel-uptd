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
            $table->unsignedBigInteger('id_kejuruan');
            $table->foreign('id_kejuruan')
                ->references('id_kejuruan')
                ->on('kejuruan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dropColumn('nama_kejuruan');
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
            $table->dropForeign(['id_kejuruan']);
            $table->dropColumn('id_kejuruan');
            $table->string('nama_kejuruan', 30);
        });
    }
};
