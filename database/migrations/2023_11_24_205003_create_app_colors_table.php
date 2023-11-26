<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('app_id');
            $table->string('primary_hex_code');
            $table->string('success_hex_code');
            $table->string('warning_hex_code');
            $table->string('danger_hex_code');
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
        Schema::dropIfExists('app_colors');
    }
}
