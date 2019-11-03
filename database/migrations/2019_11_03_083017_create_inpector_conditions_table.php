<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInpectorConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpector_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('behavior_attribute');
            $table->string('condition');
            $table->string('value');
            $table->string('instructor_id');
            $table->string('course_id')->nullable();
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
        Schema::dropIfExists('inpector_conditions');
    }
}
