<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcademicSessionTermIdToSubjectTeacherTermlyUploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_teacher_termly_uploads', function (Blueprint $table) {
            $table->integer('academic_session_term_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('academic_session_terms')
            ->delete('restrict')
            ->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_teacher_termly_uploads', function (Blueprint $table) {
            //
        });
    }
}
