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
            $table->bigIncrements('grade_id');
            $table->string('course_id');
            $table->string('student_id');
            $table->string('full_score_midterm')->nullable();
            $table->string('score_midterm')->nullable();
            $table->string('full_test_midterm')->nullable();
            $table->string('test_midterm')->nullable();
            $table->string('mean_test_midterm')->nullable();
            $table->string('total_midterm')->nullable();
            $table->string('full_score_final')->nullable();
            $table->string('score_final')->nullable();
            $table->string('full_test_final')->nullable();
            $table->string('test_final')->nullable();
            $table->string('mean_test_final')->nullable();
            $table->string('total_final')->nullable();
            $table->string('total_all')->nullable();
            $table->String('semester')->nullable();
            $table->String('year')->nullable();
            $table->String('section')->nullable();
            $table->String('gen')->nullable();
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
