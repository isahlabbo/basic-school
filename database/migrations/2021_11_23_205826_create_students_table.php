<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('parents')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('section_class_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_classes')
            ->delete('restrict')
            ->update('cascade');
            $table->string('name');
            $table->string('admission_no')->nullable();
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
        Schema::dropIfExists('students');
    }
}
