<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SectionClassStudentTermAccessmentAffectiveTrait;
use App\Models\SectionClassStudentTermAccessmentPsychomotor;

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
        $this->output->progressStart(100);
        foreach (SectionClassStudentTermAccessmentPsychomotor::all() as $psycho) {
           if(!$psycho->value && $psycho->psychomotor){
            $psycho->psychomotor->delete();
            $psycho->delete();
           }
            
            $this->output->progressAdvance();
        }
        foreach (SectionClassStudentTermAccessmentAffectiveTrait::all() as $trait) {
            if(!$trait->value && $trait->affectiveTrait){
                $trait->affectiveTrait->delete();
                $trait->delete();
            }
            
             $this->output->progressAdvance();
         }
        $this->output->progressFinish();
    }
}
