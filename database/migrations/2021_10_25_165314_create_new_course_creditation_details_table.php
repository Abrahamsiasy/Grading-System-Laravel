<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCourseCreditationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_course_creditation_details', function (Blueprint $table) {
            $table->id('credit_details_id');
            $table->string('course_code');
            $table->string('description');
            $table->char('grade');
            $table->tinyInteger('ch');
            $table->tinyInteger('ects');
            $table->boolean('is_inc')->default(false);
            $table->bigInteger('credit_id')->unsigned();
            $table->foreign('credit_id')->references('credit_id')->on('new_course_creditations')->onDelete('cascade');
            $table->bigInteger('curriculum_details_id')->nullable();
            $table->string('acad_term_id', 6);
            $table->foreign('acad_term_id')->references('acad_term_id')->on('new_acad_terms')->onDelete('cascade');
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
        Schema::dropIfExists('new_course_creditation_details');
    }
}
