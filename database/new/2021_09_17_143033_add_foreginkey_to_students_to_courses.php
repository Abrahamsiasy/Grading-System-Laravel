<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginkeyToStudentsToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            //
            // $table->unsignedBigInteger('grade_id');
            // $table->foreign('grade_id')
            //     ->references('id')->on('grades')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('course_id');
            // $table->foreign('course_id')
            //     ->references('id')->on('courses')
            //     ->onDelete('cascade');
            // $table->unsignedBigInteger('instractor_id');
            // $table->foreign('instractor_id')
            //     ->references('id')->on('instractors')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropForeign(['grade_id']);
            $table->dropColumn('grade_id');
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
            $table->dropForeign(['instractor_id']);
            $table->dropColumn('instractor_id');

        });
    }
}
