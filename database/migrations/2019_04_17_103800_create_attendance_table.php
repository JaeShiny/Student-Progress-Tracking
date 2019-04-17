<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->bigIncrements('attendance_id');
            //$table->foreign('student_id');
            //$table->foreign('course_id');
            $table->String('amount_attendance');
            $table->String('amount_absence');
            $table->String('amount_takeleave');
            $table->date('attendance_date');
            $table->date('absence_date');
            $table->date('takeleave_date');
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
        Schema::dropIfExists('attendance');
    }
}
