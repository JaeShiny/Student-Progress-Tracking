<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_survey', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            //$table->foreign('student_id');
            $table->unsignedBigInteger('questionnaire_id');
            $table->foreign('questionnaire_id')->references('questionnaire_id')->on('questionnaire');
            $table->date('survey_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_survey');
    }
}
