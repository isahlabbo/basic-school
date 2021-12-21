<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\Psychomotor;
use App\Models\AffectiveTrait;

class MigrateStudentAccessments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'school:student-accessment-migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    public function handle()
    {
        $this->output->progressStart(count(Student::all()));
        foreach(Student::all() as $student){
            foreach($student->sectionclassStudents as $sectionClassStudent){
                foreach ($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm) {
                    if($sectionClassStudentTerm->sectionClassStudentTermAccessment){
                        $affectiveTraits = [
                            ['name' => 'Punctuality', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->punctuality],
                            ['name' => 'Attendance', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->Attendance],
                            ['name' => 'Reliability', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->reliability],
                            ['name' => 'Neatness', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->neatness],
                            ['name' => 'Politeness', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->politeness],
                            ['name' => 'Honesty', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->honesty],
                            ['name' => 'Relationship With Pupils', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->relationship_with_pupils],
                            ['name' => 'Self-Control', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->self_control],
                            ['name' => 'Attentiveness', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->attentiveness],
                            ['name' => 'Perseverance', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->perseverance]
                        ];

                        foreach($affectiveTraits as $affectiveTrait){
                            
                            $sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentAffectiveTraits()->firstOrCreate([
                            'affective_trait_id'=>AffectiveTrait::where('name',$affectiveTrait['name'])->first()->id,
                            'value'=>$affectiveTrait['value']]);
                            
                        }

                        $psychomotors = [
                            ['name' => 'Handwriting', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->handwriting],
                            ['name' => 'Games', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->games],
                            ['name' => 'Sports', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->sports],
                            ['name' => 'Crafts', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->crafts],
                            ['name' => 'Drawing & Painting', 'value' => $sectionClassStudentTerm->sectionClassStudentTermAccessment->drawing_and_painting]
                        ];
                        
                        foreach($psychomotors as $psychomotor){
                            
                            $sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentPsychomotors()->firstOrCreate([
                            'psychomotor_id'=>Psychomotor::where('name',$psychomotor['name'])->first()->id,
                            'value'=>$psychomotor['value']]);
                            
                        }
                    }
                }
            }
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
    }

    
}
