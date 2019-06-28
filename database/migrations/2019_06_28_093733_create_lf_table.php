<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lf', function (Blueprint $table) {
            $table->string('instructor_id')->primary();
            $table->string('prefix', 20);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('prefix_eng', 20);
            $table->string('first_eng', 50);
            $table->string('last_eng', 50);
            $table->string('group', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lf');
    }
}
