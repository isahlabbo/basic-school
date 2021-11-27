<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Guardian;
use App\Models\Section;

class GenerateStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'school:student-generate';

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
        $this->output->progressStart(6000);
        foreach (Section::all() as $section) {
            foreach($section->sectionClasses as $sectionClass){
                $number = '08162460000';
               for($i = 1; $i <= 200; $i++){

                    $guardian = Guardian::create([
                        'name'=>'guardian test name '.$i,
                        'address'=>'guardian address '. $i,
                        'phone'=>$number+$i,
                        'email'=>$number+$i.'@wayforward.com'
                    ]);

                    $student = $guardian->students()->create([
                        'name'=>"student test name",
                        'admission_no'=>$number,
                        'date_of_birth'=>'2020/12/12',
                        'section_class_id'=>$sectionClass->id
                    ]);
                    $student->sectionClassStudents()->create(['section_class_id'=>$sectionClass->id]);
                    $number++;
                    $this->output->progressAdvance();
                }
            }
            
        }
        $this->output->progressFinish();
        return Command::SUCCESS;
    }

    

    

    
}
