<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectorConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspector_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('behavior_attribute');
            $table->string('condition');
            $table->string('value');
            $table->string('name_column')->nullable();
            $table->string('instructor_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('curriculum')->nullable();
            $table->string('position')->nullable();
            $table->string('semester')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('inspector_conditions');
    }
}
