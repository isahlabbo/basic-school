<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnToPsychomotor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('psychomotors', function (Blueprint $table) {
            $table->boolean('status')->default(1);
        });

        Schema::table('affective_traits', function (Blueprint $table) {
            $table->boolean('status')->default(1);
        });
    }

    
}
