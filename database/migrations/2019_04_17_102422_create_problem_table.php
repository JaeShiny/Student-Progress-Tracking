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
            $table->String('risk_level');
            $table->String('person_add');
            $table->String('student_id');
            $table->String('date');
            $table->unsignedBigInteger('add_id');
            $table->foreign('add_id')->references('id')->on('users');
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
        Schema::dropIfExists('problem');
    }
}
