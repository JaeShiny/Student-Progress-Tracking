<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->date('birth');
            $table->string('status',10);
            $table->string('address',200);
            $table->string('zipcode',5);
            $table->string('tel',30);
            $table->string('email',50);
            $table->string('prefix',20);
            $table->string('prefix_eng',20);
            $table->string('firstname_eng',50);
            $table->string('lastname_eng',50);
            $table->string('sex',5);
            $table->string('nationality',15);
            $table->string('origin',15);
            $table->string('religion',15);
            $table->string('province',50);
            $table->string('pic_filename',255);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('educationOfficer_id');
            $table->foreign('educationOfficer_id')->references('educationOfficer_id')->on('education_officer');
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')->references('instructor_id')->on('instructor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
