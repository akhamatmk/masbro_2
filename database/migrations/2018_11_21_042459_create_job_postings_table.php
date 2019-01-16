<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_job_id')->unsigned();
            $table->integer('provincy_id')->unsigned();
            $table->integer('regency_id')->unsigned();
            $table->text('job_description')->nullable();
            $table->text('how_to_apply')->nullable();
            $table->text('job_requirements')->nullable();
            $table->string('sallary')->nullable();
            $table->string('title')->nullable();
            $table->boolean('type_payment')->default(1);
            $table->text('detail_address')->nullable();
            $table->string('experience')->nullable();
            $table->date('deadline_jobs')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_job_id')->references('id')->on('category_jobs');
            $table->foreign('provincy_id')->references('id')->on('provinces');
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
        Schema::dropIfExists('job_postings');
    }
}
