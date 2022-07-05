<?php

use App\Models\CalonPesertaPelatihan;
use App\Models\Paket;
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
        $peserta = CalonPesertaPelatihan::all();
        if($peserta->count() > 0){
            $peserta->each(function ($peserta) {
                $paket = Paket::latest()->where('id_kejuruan', $peserta->id_kejuruan)->first();
                if($paket){
                    $peserta->id_paket = $paket->id_paket;
                    $peserta->save();
                }
            });
        }

        Schema::table('peserta', function (Blueprint $table) {
            $table->dropForeign(['id_kejuruan']);
            $table->dropColumn('id_kejuruan');
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
            $table->unsignedBigInteger('id_kejuruan')->nullable();
            $table->foreign('id_kejuruan')->references('id_kejuruan')->on('kejuruan')
                ->onDelete('set null')
                ->cascadeOnUpdate();
        });
    }
};
