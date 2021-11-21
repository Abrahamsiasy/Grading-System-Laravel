<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_classes', function (Blueprint $table) {
            $table->id('class_id');
            $table->string('section')->nullable();
            $table->string('room')->nullable();
            $table->string('acad_term_id');
            $table->foreign('acad_term_id')->references('acad_term_id')->on('new_acad_terms')->onDelete('cascade');
            $table->string('course_code');
            $table->foreign('course_code')->references('course_code')->on('new_courses')->onDelete('cascade');
            $table->string('instructor_id');
            $table->foreign('instructor_id')->references('employee_no')->on('new_employees')->onDelete('cascade');
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
        Schema::dropIfExists('new_classes');
    }
}
