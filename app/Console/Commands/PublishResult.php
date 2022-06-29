<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Section;

class PublishResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'school:publish-results';

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
        $this->output->progressStart(count(Section::all()));
        foreach (Section::all() as $section) {
            foreach ($section->sectionClasses as $sectionClass) {
                foreach($sectionClass->sectionClassStudents as $sectionClassStudent){
                    foreach($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm){
                        $sectionClassStudentTerm->publishThisTrmResult();
                    }
                }
            }
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
    }
}