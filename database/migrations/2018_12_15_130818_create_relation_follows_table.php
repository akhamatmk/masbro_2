<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_first')->unsigned();
            $table->integer('user_second')->unsigned();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('user_first')->references('id')->on('users');
            $table->foreign('user_second')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_follows');
    }
}
