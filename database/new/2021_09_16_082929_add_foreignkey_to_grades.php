<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            //
            // $table->unsignedBigInteger('student_id');
            // $table->foreign('student_id')
            //     ->references('id')->on('students')
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
        Schema::table('grades', function (Blueprint $table) {
            //
            $table->dropColumn('student_id');
            $table->dropColumn('course_id');
            $table->dropColumn('instractor_id');
            

        });
    }
}
