<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionIdToGradeScales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('remark_scales', function (Blueprint $table) {
            $table->integer('section_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sections')
            ->delete('restrict');
        });

        Schema::table('grade_scales', function (Blueprint $table) {
            $table->integer('section_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sections')
            ->delete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grade_scales', function (Blueprint $table) {
            //
        });
    }
}
