<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('section_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('sections')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('capacity')->default('20');
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
        Schema::dropIfExists('section_classes');
    }
}
