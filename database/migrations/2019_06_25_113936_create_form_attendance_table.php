<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_attendance', function (Blueprint $table) {
            $table->string('course_id', 30)->primary();
            $table->string('student_id')->nullable();
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
            $table->string('date1')->nullable();
            $table->string('date2')->nullable();
            $table->string('date3')->nullable();
            $table->string('date4')->nullable();
            $table->string('date5')->nullable();
            $table->string('date6')->nullable();
            $table->string('date7')->nullable();
            $table->string('date8')->nullable();
            $table->string('date9')->nullable();
            $table->string('date10')->nullable();
            $table->string('date11')->nullable();
            $table->string('date12')->nullable();
            $table->string('date13')->nullable();
            $table->string('date14')->nullable();
            $table->string('date15')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_attendance');
    }
}
