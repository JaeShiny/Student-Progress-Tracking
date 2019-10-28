<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            // $table->bigIncrements('question_id');
            // $table->unsignedBigInteger('questionnaire_id');
            // $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaire');
            // $table->unsignedBigInteger('questionType_id');
            // $table->foreign('questionType_id')->references('questionType_id')->on('question_type');
            // $table->String('question_name');
            // $table->String('semester');
            // $table->String('year');
            // $table->String('section');
            // $table->String('gen');
            // $table->timestamps();
            $table->increments('id');
            $table->integer('survey_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->string('question_type');
            $table->string('option_name')->nullable();
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
        Schema::dropIfExists('question');
    }
}
