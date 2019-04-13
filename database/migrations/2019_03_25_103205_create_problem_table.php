<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->bigIncrements('problem_id');
            $table->unsignedBigInteger('problemType_id');
            $table->foreign('problemType_id')->references('problemType_id')->on('problem_type');
            $table->String('problem_topic');
            $table->String('problem_detail');
            $table->String('behavior_topic');
            $table->String('behavior_detail');
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
        Schema::dropIfExists('problem');
    }
}
