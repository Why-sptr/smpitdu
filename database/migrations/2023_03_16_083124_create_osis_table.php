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
        Schema::create('osis', function (Blueprint $table) {
            $table->id(); 
            $table->string('foto');
            $table->string('nama');
            $table->enum('jabatan',['Ketua Osis','Wakil Ketua','Sekertaris','Bendahara','Sie TIK']);
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
        Schema::dropIfExists('osis');
    }
};
