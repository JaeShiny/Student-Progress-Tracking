<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeDisplayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grade', function (Blueprint $table) {
            $table->boolean('is_displayA')
            ->after('is_display')
            ->default(false);
            $table->boolean('is_displayLF')
            ->after('is_displayA')
            ->default(false);
            $table->boolean('is_displayE')
            ->after('is_displayLF')
            ->default(false);
            $table->boolean('is_displayS')
            ->after('is_displayE')
            ->default(false);
            $table->boolean('is_displayAL')
            ->after('is_displayS')
            ->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grade', function (Blueprint $table) {
            $table->dropColumn('is_displayA');
            $table->dropColumn('is_displayLF');
            $table->dropColumn('is_displayE');
            $table->dropColumn('is_displayS');
            $table->dropColumn('is_displayAL');
        });
    }
}
