<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionClassPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_class_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('section_class_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('section_classes')
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
            $table->string('name');
            $table->string('amount');
            $table->string('gender');
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
        Schema::dropIfExists('section_class_payments');
    }
}
