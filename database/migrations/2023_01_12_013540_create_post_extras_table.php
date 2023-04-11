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
        Schema::create('post_extras', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->text("cover");
            $table->string("jadwal");
            $table->string("jam");
            $table->string("lokasi");
            $table->text("tentang");
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
        Schema::dropIfExists('post_extras');
    }
};
