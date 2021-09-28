<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
            // $table->unsignedBigInteger('student_id');
            // $table->foreign('student_id')
            //     ->references('id')->on('students')
            //     ->onDelete('cascade');

            // $table->unsignedBigInteger('grade_id');
            // $table->foreign('grade_id')
            //     ->references('id')->on('grades')
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
        Schema::table('courses', function (Blueprint $table) {
            //
            // $table->dropColumn('instractor_id');
            // $table->dropColumn('grade_id');
        });
    }
}
