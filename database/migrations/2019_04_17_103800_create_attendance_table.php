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
            $table->string('course_id')->nullable();
            $table->string('student_id')->nullable();
            $table->String('period_total')->nullable();
            $table->String('amount_attendance')->nullable();
            $table->String('amount_absence')->nullable();
            $table->string('period_1')->nullable();
            $table->string('period_2')->nullable();
            $table->string('period_3')->nullable();
            $table->string('period_4')->nullable();
            $table->string('period_5')->nullable();
            $table->string('period_6')->nullable();
            $table->string('period_7')->nullable();
            $table->string('period_8')->nullable();
            $table->string('period_9')->nullable();
            $table->string('period_10')->nullable();
            $table->string('period_11')->nullable();
            $table->string('period_12')->nullable();
            $table->string('period_13')->nullable();
            $table->string('period_14')->nullable();
            $table->string('period_15')->nullable();
            $table->String('semester')->nullable();
            $table->String('year')->nullable();
            $table->String('section')->nullable();
            $table->String('gen')->nullable();
            $table->String('person_add')->nullable();
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
