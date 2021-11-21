<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_students', function (Blueprint $table) {
            $table->string('student_no')->primary();
            $table->string('student_type');
            $table->bigInteger('curriculum_id')->unsigned();
            $table->foreign('curriculum_id')->references('curriculum_id')->on('new_curriculam')->onDelete('cascade');
            $table->string('acad_term_admitted_id');
            $table->foreign('acad_term_admitted_id')->references('acad_term_id')->on('new_acad_terms')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('new_students');
    }
}
