<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginkeyCariculumIdNewClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_classes', function (Blueprint $table) {
            //
            $table->bigInteger('curriculum_id')->unsigned()->index()->nullable();
            $table->foreign('curriculum_id')->references('curriculum_id')->on('new_curriculam')->on('holdings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_classes', function (Blueprint $table) {
            //
            $table->dropForeign(['curriculum_id']);
        });
    }
}
