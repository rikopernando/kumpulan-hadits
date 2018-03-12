<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableKumpulanHadits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('kumpulan_hadits', function (Blueprint $table) {
            $table->integer('tipe_hadits')->change()->comment = "1.abudaud, 2.bukhari, 3.malik, 4.ahmad";
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
