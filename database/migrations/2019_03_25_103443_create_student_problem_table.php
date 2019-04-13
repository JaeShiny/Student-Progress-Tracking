<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_problem', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->unsignedBigInteger('problem_id');
            $table->foreign('problem_id')->references('problem_id')->on('problem');
            //$table->foreign('student_id')->references('student_id')->on('student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_problem');
    }
}
