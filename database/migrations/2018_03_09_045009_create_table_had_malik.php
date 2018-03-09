<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHadMalik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('had_malik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('NoHdt');
            $table->text('Isi_Arab');
            $table->text('Isi_Indonesia');
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
        Schema::dropIfExists('had_malik');
    }
}
