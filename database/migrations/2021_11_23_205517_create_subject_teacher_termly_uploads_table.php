<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTeacherTermlyUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teacher_termly_uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('section_class_subject_teacher_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_class_subject_teachers')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('term_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('terms')
            ->delete('restrict')
            ->update('cascade');
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
        Schema::dropIfExists('subject_teacher_termly_uploads');
    }
}
