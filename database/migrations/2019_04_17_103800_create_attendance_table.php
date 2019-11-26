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
            $table->integer('period_total')->nullable();
            $table->integer('amount_attendance')->nullable();
            $table->integer('amount_absence')->nullable();
            $table->integer('period_1')->nullable();
            $table->integer('period_2')->nullable();
            $table->integer('period_3')->nullable();
            $table->integer('period_4')->nullable();
            $table->integer('period_5')->nullable();
            $table->integer('period_6')->nullable();
            $table->integer('period_7')->nullable();
            $table->integer('period_8')->nullable();
            $table->integer('period_9')->nullable();
            $table->integer('period_10')->nullable();
            $table->integer('period_11')->nullable();
            $table->integer('period_12')->nullable();
            $table->integer('period_13')->nullable();
            $table->integer('period_14')->nullable();
            $table->integer('period_15')->nullable();
            $table->String('person_add')->nullable();
            $table->string('instructor_id')->nullable();
            $table->boolean('is_display')->default(false);
            $table->String('semester')->nullable();
            $table->String('year')->nullable();
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
        Schema::dropIfExists('attendance');
    }
}
