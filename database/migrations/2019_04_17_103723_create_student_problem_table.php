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
            // $table->bigIncrements('problem_id');
       $table->string('student_id');
           $table->String('problem_type');
            $table->String('problem_detail');
            $table->String('risk_level');
            $table->String('person_add');
            $table->timestamps();        });
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
