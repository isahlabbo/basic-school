<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassReservedAdmissionNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_class_reserved_admission_nos', function (Blueprint $table) {
            $table->id();
            $table->integer('academic_session_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('academic_sessions')
            ->delete('restrict');
            $table->integer('section_class_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_classes')
            ->delete('restrict');
            $table->string('admission_no');
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
        Schema::dropIfExists('section_class_reserved_admission_nos');
    }
}
