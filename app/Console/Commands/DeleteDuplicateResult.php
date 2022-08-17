<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SectionClassStudentTerm;

class DeleteDuplicateResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:duplicate-results';

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
        $this->output->progressStart(count(SectionClassStudentTerm::all()));
        foreach (SectionClassStudentTerm::all() as $studentTerm) {
            $term = $studentTerm->academicSessionTerm->term;
            if ($term->id == 1) {
                $subject = null;
                foreach($studentTerm->studentResults as $studentResult){
                    $currentSubject = $studentResult->subjectTeacherTermlyUpload->sectionClassSubjectTeacher->sectionClassSubject->subject->name;
                    if($subject == $currentSubject){
                        $studentResult->delete();
                    }else{
                        $subject = $currentSubject;
                    }
                }  
            }else if($term->id == 2){
                foreach($studentTerm->studentResults as $studentResult){
                    if((time() - strtotime($studentResult->created_at)) < 6040800){
                        $studentResult->delete();
                    }
                } 
            }
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
    }
}
