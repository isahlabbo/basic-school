<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermSubjectResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_subject_results', function (Blueprint $table) {
            $table->id();
            $table->integer('term_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('terms')
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
            $table->integer('result_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('results')
            ->delete('restrict')
            ->update('cascade');
            $table->string('ca')->default('0');
            $table->string('exam')->default('0');
            $table->string('total')->default('0');
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
        Schema::dropIfExists('term_subject_results');
    }
}
