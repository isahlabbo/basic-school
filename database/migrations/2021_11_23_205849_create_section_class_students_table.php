<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_class_students', function (Blueprint $table) {
            $table->id();
            $table->integer('section_class_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_classes')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('student_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('students')
            ->delete('restrict')
            ->update('cascade');
            $table->string('status')->default('Active');
            
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
        Schema::dropIfExists('section_class_students');
    }
}
