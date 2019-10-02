<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_berita', function (Blueprint $table){
            $table->increments('id_berita');
            $table->string('judul_berita');
            $table->string('genre_berita');
            $table->string('isi_berita');
            $table->string('foto_berita');

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
        Schema::dropIfExists('t_berita');
    }
}
