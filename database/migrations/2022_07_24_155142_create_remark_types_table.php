<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarkTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remark_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('section_classes', function (Blueprint $table) {
            $table->integer('remark_type_id')
            ->unsign()
            ->default(1)
            ->foreign()
            ->refrencies('id')
            ->on('remark_types');
        });

        foreach(['Position', 'Remark'] as $remark){
            App\Models\RemarkType::firstOrCreate(['name'=>$remark]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remark_types');
    }
}
