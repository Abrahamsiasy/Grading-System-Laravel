<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCourseCreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_course_creditations', function (Blueprint $table) {
            $table->id('credit_id');
            $table->string('description', 50);
            $table->string('student_no', 10);
            $table->foreign('student_no')->references('student_no')->on('new_students')->onDelete('cascade');
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
        Schema::dropIfExists('new_course_creditations');
    }
}
