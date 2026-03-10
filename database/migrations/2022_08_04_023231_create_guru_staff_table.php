<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_staff', function (Blueprint $table) {
            $table->bigIncrements('idGuruStaff');
            $table->text('fotoGuruStaff')->nullable();
            $table->string('namaGuruStaff')->nullable();
            $table->string('jabatanGuruStaff')->nullable();
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
        Schema::dropIfExists('guru_staff');
    }
}
