<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(){
        Schema::table('kejuruan', function (Blueprint $table) {
            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('jadwal_pelatihan')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down(){
        Schema::table('kejuruan', function (Blueprint $table) {
            $table->dropForeign(['id_jadwal']);
            $table->dropColumn('id_jadwal');
        });
    }
};
