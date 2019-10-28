<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            // $table->bigIncrements('answer_id');
            // $table->unsignedBigInteger('question_id');
            // $table->foreign('question_id')->references('question_id')->on('question');
            // $table->unsignedBigInteger('choice_id');
            // $table->foreign('choice_id')->references('choice_id')->on('choice');
            // $table->unsignedBigInteger('questionnaire_id');
            // $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaire');
            // $table->text('answer');
            // $table->timestamps();
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('question_id');
            $table->integer('survey_id');
            $table->string('answer');
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
        Schema::dropIfExists('answer');
    }
}
