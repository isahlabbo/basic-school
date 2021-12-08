<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_class_student_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('section_class_student_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_class_students')
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
            $table->string('amount');
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
        Schema::dropIfExists('section_class_student_payments');
    }
}
