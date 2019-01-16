<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('province_id')->nullable()->unsigned();
            $table->integer('regency_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->year('from_year')->nullable();
            $table->year('until_year')->nullable();
            $table->integer('from_month')->nullable();
            $table->integer('until_month')->nullable();
            $table->boolean('currently')->default(1);
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('regency_id')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
