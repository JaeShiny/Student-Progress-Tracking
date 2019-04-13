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
            // $db2 = DB::connection('mysql2')->getDatabaseName();
            // $db3 = DB::connection('mysql3')->getDatabaseName();
            // $db4 = DB::connection('mysql4')->getDatabaseName();



            // $table->unsignedBigInteger('student_id');
            // $table->foreign('student_id_srm')->references('student_id')->on(new Expression($db4 . '.alumni_profile'));
            // $table->foreign('student_id_srm')->references('student_id')->on('db4.alumni_profile');

            $table->bigIncrements('student_id');
            $table->string('status', 10);
            $table->string('plan', 1);
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')->references('instructor_id')->on('instructor');
            $table->string('class', 2);
            $table->string('adviser_id1', 3);
            $table->string('adviser_id2', 3);
            $table->double('gpa', 6,2);
            $table->string('project_work', 150);
            $table->string('pro_credit', 3);
            $table->string('grad_semester', 1);
            $table->string('grad_year', 4);
            $table->date('grad_date');
            $table->string('remark', 100);
            $table->string('project_work_eng', 150);
            $table->string('pro_semester', 1);
            $table->string('pro_year', 4);
            $table->string('workshop_name_1', 100);
            $table->string('workshop_name_2', 100);
            $table->string('workshop_id_1', 7);
            $table->string('workshop_id_2', 7);
            $table->date('thesis_date');

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
