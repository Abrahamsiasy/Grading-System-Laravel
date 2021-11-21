<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCurriculumDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_curriculum_details', function (Blueprint $table) {
            $table->id('curriculum_details_id');
            $table->tinyInteger('year');
            $table->tinyInteger('semester');
            $table->boolean('is_year_active');
            $table->bigInteger('curriculum_id')->unsigned();


            $table->foreign('curriculum_id')->references('curriculum_id')->on('new_curriculam')->onDelete('cascade');
            $table->string('course_code');
            $table->foreign('course_code')->references('course_code')->on('new_courses')->onDelete('cascade');
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
        Schema::dropIfExists('new_curriculum_details');
    }
}
