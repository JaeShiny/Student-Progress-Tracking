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
            $table->string('course_id');
            $table->string('student_id');
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
