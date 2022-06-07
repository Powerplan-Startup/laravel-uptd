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
            /**
             * drop pekerjaan column if exists
             * 
             */
            if (Schema::hasColumn('peserta', 'pekerjaan')) {
                $table->dropColumn('pekerjaan');
            }
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
            /**
             * add pekerjaan column if not exists
             * 
             */
            if (!Schema::hasColumn('peserta', 'pekerjaan')) {
                $table->string('pekerjaan')->nullable();
            }
        });
    }
};
