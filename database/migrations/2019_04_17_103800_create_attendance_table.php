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
            $table->string('course_id');
            $table->string('student_id');
            $table->String('section_total');
            $table->String('amount_absence');
            $table->String('amount_takeleave');
            $table->String('amount_total');
            $table->String('date_absence1');
            $table->String('date_absence2');
            $table->String('date_absence3');
            $table->String('date_absence4');
            $table->String('date_takeleave1');
            $table->String('date_takeleave2');
            $table->String('date_takeleave3');
            $table->String('date_takeleave4');
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
        Schema::dropIfExists('attendance');
    }
}
