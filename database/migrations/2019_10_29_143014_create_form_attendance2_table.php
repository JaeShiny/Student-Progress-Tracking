<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAttendance2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_attendance2', function (Blueprint $table) {
            $table->string('course_id', 30)->primary();
            $table->string('student_id')->nullable();
            $table->string('period_1')->nullable();
            $table->string('period_16')->nullable();
            $table->string('period_2')->nullable();
            $table->string('period_17')->nullable();
            $table->string('period_3')->nullable();
            $table->string('period_18')->nullable();
            $table->string('period_4')->nullable();
            $table->string('period_19')->nullable();
            $table->string('period_5')->nullable();
            $table->string('period_20')->nullable();
            $table->string('period_6')->nullable();
            $table->string('period_21')->nullable();
            $table->string('period_7')->nullable();
            $table->string('period_22')->nullable();
            $table->string('period_8')->nullable();
            $table->string('period_23')->nullable();
            $table->string('period_9')->nullable();
            $table->string('period_24')->nullable();
            $table->string('period_10')->nullable();
            $table->string('period_25')->nullable();
            $table->string('period_11')->nullable();
            $table->string('period_26')->nullable();
            $table->string('period_12')->nullable();
            $table->string('period_27')->nullable();
            $table->string('period_13')->nullable();
            $table->string('period_28')->nullable();
            $table->string('period_14')->nullable();
            $table->string('period_29')->nullable();
            $table->string('period_15')->nullable();
            $table->string('period_30')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_attendance2');
    }
}
