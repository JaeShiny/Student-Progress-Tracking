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
            $table->bigIncrements('question_id');
            $table->unsignedBigInteger('questionnaire_id');
            $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaire');
            $table->unsignedBigInteger('questionType_id');
            $table->foreign('questionType_id')->references('questionType_id')->on('question_type');
            $table->String('question_name');
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
