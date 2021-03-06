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
            $table->integer('exam_subject_question_section_id')
            ->unsign()
            ->nullable()
            ->foreign()
            ->refrencies('id')
            ->on('exam_subject_question_sections');
            $table->integer('question_type_id')
            ->unsign()
            ->nullable()
            ->foreign()
            ->refrencies('id')
            ->on('question_types');
            $table->text('diagram')->nullable();
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
