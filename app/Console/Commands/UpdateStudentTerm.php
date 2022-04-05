<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SectionClass;

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
        $this->output->progressStart(count(SectionClass::all()));
        foreach (SectionClass::all() as $sectionClass) {
            foreach($sectionClass->sectionClassStudents as $sectionClassStudent){
                $sectionClassStudent->updateActiveTerm();
            }
            $this->output->progressAdvance();
        }
        
        $this->output->progressFinish();
    }
}
