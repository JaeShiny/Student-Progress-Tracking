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
            $table->integer('full_score_midterm')->nullable();
            $table->integer('score_midterm')->nullable();
            $table->integer('full_test_midterm')->nullable();
            $table->integer('test_midterm')->nullable();
            $table->integer('mean_test_midterm')->nullable();
            $table->integer('total_midterm')->nullable();
            $table->integer('full_score_final')->nullable();
            $table->integer('score_final')->nullable();
            $table->integer('full_test_final')->nullable();
            $table->integer('test_final')->nullable();
            $table->integer('mean_test_final')->nullable();
            $table->integer('total_final')->nullable();
            $table->integer('total_all')->nullable();
            $table->String('semester')->nullable();
            $table->String('year')->nullable();
            $table->String('section')->nullable();
            $table->String('gen')->nullable();
            $table->String('person_add')->nullable();
            $table->string('instructor_id')->nullable();
            $table->boolean('is_display')->default(false);
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
