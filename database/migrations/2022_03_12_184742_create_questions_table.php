<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_type_id')
            ->unsign()
            ->nullable()
            ->foreign()
            ->refrencies('id')
            ->on('question_types');
            $table->integer('section_class_subject_id')
            ->unsign()
            ->nullable()
            ->foreign()
            ->refrencies('id')
            ->on('section_class_subjects');
            $table->text('diagram');
            $table->text('question');
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
        Schema::dropIfExists('questions');
    }
}
