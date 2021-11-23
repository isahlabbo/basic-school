<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('teachers')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('subject_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('subjects')
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
        Schema::dropIfExists('teacher_subjects');
    }
}
