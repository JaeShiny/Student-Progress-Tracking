<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->bigIncrements('problem_id');
            $table->String('problem_type');
            $table->String('problem_topic');
            $table->String('problem_detail');
            $table->integer('risk_level');
            $table->String('person_add');
            $table->String('student_id');
            $table->String('date');
            $table->unsignedBigInteger('add_id');
            $table->foreign('add_id')->references('id')->on('users');
            $table->String('semester')->nullable();
            $table->String('year')->nullable();
            $table->String('section')->nullable();
            $table->String('gen')->nullable();
            $table->string('course_id')->nullable();
            $table->string('instructor_id')->nullable();
            $table->boolean('is_display')->default(false);
            $table->boolean('is_displayA')->default(false);
            $table->boolean('is_displayLF')->default(false);
            $table->boolean('is_displayAL')->default(false);
            $table->boolean('is_displayE')->default(false);
            $table->boolean('is_displayS')->default(false);
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
        Schema::dropIfExists('problem');
    }
}
