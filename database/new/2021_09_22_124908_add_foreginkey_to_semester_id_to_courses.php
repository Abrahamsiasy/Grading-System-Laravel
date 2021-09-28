<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginkeyToSemesterIdToCourses extends Migration
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
            // $table->unsignedBigInteger('semester_id');
            // $table->foreign('semester_id')
            //     ->references('id')->on('semesters')
            //     ->onDelete('cascade');
            $table->foreignId('semester_id')->constrained();
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
            $table->dropForeign(['semester_id']);
            $table->dropColumn('semester_id');

        });
    }
}
