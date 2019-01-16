<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryParentJobId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_jobs', function (Blueprint $table) {
            $table->unsignedInteger('category_parent_job_id')->after('id')->nullable();

            $table->foreign('category_parent_job_id')->references('id')->on('category_parent_jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_jobs', function (Blueprint $table) {
            $table->dropForeign('category_jobs_category_parent_job_id_foreign');
        });
    }
}
