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
        Schema::table('instruktur', function (Blueprint $table) {
            //
            $table->string("username",50)->nullable(); 
            $table->string("password")->nullable(); 
            $table->text("foto")->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instruktur', function (Blueprint $table) {
            //
            $table->dropColumn("username"); 
            $table->dropColumn("password"); 
            $table->dropColumn("foto"); 
        });
    }
};
