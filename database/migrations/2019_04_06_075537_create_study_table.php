<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study', function (Blueprint $table) {
            $table->bigIncrements('study_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('student');
            $table->integer('semester')->unsigned();
            $table->integer('year')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('section')->unsigned();
            $table->string('credit', 2);
            $table->double('collect_score', 5,2);
            $table->double('mid_score', 5,2);
            $table->double('fi_score', 5,2);
            $table->double('total', 5,2);
            $table->string('grade', 2);
            $table->double('credit_regis', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study');
    }
}
