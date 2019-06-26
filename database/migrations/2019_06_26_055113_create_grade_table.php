<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->bigIncrements('course_id');
            $table->string('student_id');
            $table->string('full_score_midterm');
            $table->string('score_midterm');
            $table->string('full_test_midterm');
            $table->string('test_midterm');
            $table->string('mean_test_midterm');
            $table->string('total_midterm');
            $table->string('full_score_final');
            $table->string('score_final');
            $table->string('full_test_final');
            $table->string('test_final');
            $table->string('mean_test_final');
            $table->string('total_final');
            $table->string('total_all');
            $table->String('semester');
            $table->String('year');
            $table->String('section');
            $table->String('gen');
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
        Schema::dropIfExists('grade');
    }
}
