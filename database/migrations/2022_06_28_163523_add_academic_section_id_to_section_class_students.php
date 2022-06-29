<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Section;

class AddAcademicSectionIdToSectionClassStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('section_class_students', function (Blueprint $table) {
            $table->integer('academic_session_id')
            ->unsign()
            ->nullable()
            ->foreign()
            ->default(Section::find(1)->currentSession()->id)
            ->refrencies('id')
            ->on('academic_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_class_students', function (Blueprint $table) {
            //
        });
    }
}
