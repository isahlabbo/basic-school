<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SectionClassStudent;

class UpdateStudentTerm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'school:student-term-update';

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
        $this->output->progressStart(count(SectionClassStudent::all()));
        foreach (SectionClassStudent::all() as $classStudent) {
            if(count($classStudent->sectionClassStudentTerms) == 0){
                foreach($classStudent->currentSession()->academicSessionTerms as $academicSessionTerm){
                    $studentTerm = $academicSessionTerm->sectionClassStudentTerms()->create([
                        'section_class_student_id'=>$classStudent->id]);
                    if($studentTerm->academicSessionTerm->term->id == $classStudent->currentSessionTerm()->term->id){
                        $studentTerm->update(['status'=>'Active']);
                    }
                }
            }
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
    }
}
