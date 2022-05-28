<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id('nomor_peserta');
            /**
             * nama, jenis kelamin, nik, tempat lahir, tanggal lahir, umur, alamat, email, no hp, pendidikan terakhir, nama kejuruan, agama, status, tanggal daftar, nip, angkatan, pekerjaan
             * 
             */
            $table->string('nama', 30);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('nik', 16);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->string('alamat', 30);
            $table->string('email', 30);
            $table->string('no_hp', 12);
            $table->string('pendidikan_terakhir', 10);
            $table->unsignedBigInteger('id_kejuruan')->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu']);
            $table->enum('status', ['lajang', 'menikah', 'duda', 'janda']);
            $table->date('tanggal_daftar');
            $table->string('nip', 18)->comment('nip instruktur');
            $table->string('angkatan', 4);
            $table->enum('status_peserta', ['calon', 'aktif', 'tidak_aktif', 'alumni'])->default('calon');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peserta');
    }
};
