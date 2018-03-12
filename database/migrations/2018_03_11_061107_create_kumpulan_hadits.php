<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKumpulanHadits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumpulan_hadits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('NoHdt');
            $table->text('Isi_Arab');
            $table->text('Isi_Indonesia');
            $table->integer('tipe_hadits');
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
        Schema::dropIfExists('kumpulan_hadits');
    }
}
