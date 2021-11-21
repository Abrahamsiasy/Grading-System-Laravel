<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_grades', function (Blueprint $table) {
            $table->id('grade_id');
            $table->decimal('others', 4, 2)->nullable();
            $table->decimal('midterms',4, 2)->nullable();
            $table->decimal('finals',4, 2)->nullable();
            $table->string('grade')->nullable()->default(null);
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('new_classes')->onDelete('cascade');
            $table->string('student_no');
            $table->foreign('student_no')->references('student_no')->on('new_students')->onDelete('cascade');
            $table->bigInteger('curriculum_details_id')->unsigned()->nullable();
            $table->foreign('curriculum_details_id')->references('curriculum_details_id')->on('new_curriculum_details')->onUpdate('cascade');
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
        Schema::dropIfExists('new_grades');
    }
}
