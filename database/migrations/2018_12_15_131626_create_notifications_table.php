<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_first')->unsigned();
            $table->integer('user_second')->unsigned()->nullable();
            $table->boolean('type')->default(0);
            $table->boolean('read_notif')->default(0);
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
        Schema::dropIfExists('notifications');
    }
}
