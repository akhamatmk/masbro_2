<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('province_id')->unsigned();
            $table->integer('regency_id')->unsigned();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();
            $table->text('bio')->nullable();            
            $table->string('experience')->nullable();
            $table->string('profile_image')->default('default.png');            
            $table->text('addreess')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
