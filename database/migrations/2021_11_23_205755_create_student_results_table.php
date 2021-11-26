<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->integer('section_class_student_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_class_students')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('subject_teacher_termly_upload_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('subject_teacher_termly_uploads')
            ->delete('restrict')
            ->update('cascade');
            $table->string('ca')->default('0');
            $table->string('exam')->default('0');
            $table->string('total')->default('0');
            $table->string('grade')->default('F');
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
        Schema::dropIfExists('student_results');
    }
}
