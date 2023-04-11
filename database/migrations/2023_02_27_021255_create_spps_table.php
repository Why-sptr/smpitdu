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
        Schema::create('spps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('NIS_id');
            $table->string('NIS_type');
            $table->string('tahun_ajaran');
            $table->string('tanggal_tagihan');
            $table->string('tagihan');
            $table->enum('status',['Lunas','Belum Lunas']);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spps');
    }
};
