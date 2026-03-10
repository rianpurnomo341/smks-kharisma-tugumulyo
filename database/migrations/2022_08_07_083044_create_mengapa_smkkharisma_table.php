<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMengapaSmkkharismaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengapa_smkkharisma', function (Blueprint $table) {
            $table->bigIncrements('idMengapaSmkkharisma');
            $table->text('deskripsiMengapaSmkkharisma')->nullable();
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
        Schema::dropIfExists('mengapa_smkkharisma');
    }
}
