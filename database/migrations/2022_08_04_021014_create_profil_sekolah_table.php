<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->bigIncrements('idProfilSekolah');
            $table->text('fotoSejarah')->nullable();
            $table->text('deskripsiSejarah')->nullable();
            $table->text('fotoStrukturSekolah')->nullable();
            $table->text('deskripsiStrukturSekolah')->nullable();
            $table->text('videoSambutanPimpinan')->nullable();
            $table->string('namaSambutanPimpinan')->nullable();
            $table->text('deskripsiSambutanPimpinan')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('tujuan')->nullable();
            $table->integer('jmlSiswaSiswi')->nullable();
            $table->integer('jmlRuangKelas')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->text('peta')->nullable();
            $table->text('fotoMengapaSmkkharisma')->nullable();
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
        Schema::dropIfExists('profil_sekolah');
    }
}
