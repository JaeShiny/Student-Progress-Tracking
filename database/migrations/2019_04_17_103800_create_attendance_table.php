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
            $table->String('period_total');
            $table->String('amount_absence');
            $table->string('period_1');
            $table->string('period_2');
            $table->string('period_3');
            $table->string('period_4');
            $table->string('period_5');
            $table->string('period_6');
            $table->string('period_7');
            $table->string('period_8');
            $table->string('period_9');
            $table->string('period_10');
            $table->string('period_11');
            $table->string('period_12');
            $table->string('period_13');
            $table->string('period_14');
            $table->string('period_15');
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
