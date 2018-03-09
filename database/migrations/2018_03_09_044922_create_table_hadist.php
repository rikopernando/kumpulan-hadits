<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHadist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no');
            $table->string('Kitab');
            $table->text('Arab');
            $table->string('hadist');
            $table->string('Bab');
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
        Schema::dropIfExists('hadist');
    }
}
