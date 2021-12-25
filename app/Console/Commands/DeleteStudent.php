<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use App\Models\Student;
=======
>>>>>>> deeb64acc1133690d2cad96a15076644eec8806e

class DeleteStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $signature = 'school:dummy-student-clean';
=======
    protected $signature = 'command:name';
>>>>>>> deeb64acc1133690d2cad96a15076644eec8806e

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
<<<<<<< HEAD
        $this->output->progressStart(count(Student::all()));
        foreach (Student::all() as $student) {
            if($student->name == 'student test name'){
                foreach ($student->sectionClassStudents as $class) {
                    foreach($class->sectionClassStudentTerms as $term){
                        $term->delete();
                    }
                    $class->delete();
                }
                $student->delete();
            }
            
            $this->output->progressAdvance();
            
        }
        $this->output->progressFinish();
=======
        return 0;
>>>>>>> deeb64acc1133690d2cad96a15076644eec8806e
    }
}
