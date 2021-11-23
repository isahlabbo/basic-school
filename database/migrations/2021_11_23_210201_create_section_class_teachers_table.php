<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_class_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('class_section_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('class_sections')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('teacher_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('teachers')
            ->delete('restrict')
            ->update('cascade');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('section_class_teachers');
    }
}
