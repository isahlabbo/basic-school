<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SectionClass;
use App\Models\Guardian;

class SectionClassStudentImport implements ToModel
{
    protected $sectionClass;

    public function __construct(SectionClass $classClass)
    {
        $this->sectionClass = $classClass;
    }

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        // student name = $row[0];
        // guadian name = $row[1];
        // student gender = $row[2];
        // student date_of_birth = $row[3];
        if($row[0] != 'Guardian Name'){
           if(!$row[0]){
               $row[0] = 'Guardian';
           }
           if($row[4]){
                $guardian = Guardian::create([
                    'name'=>strtoupper($row[0]),
                    'phone'=>$row[1],
                    'email'=>$row[2],
                    'address'=>$row[3]
                ]);

                $student = $guardian->students()->create([
                    'name'=>strtoupper($row[4]),
                    'date_of_birth'=>$this->getDate($row[5]),
                    'admission_no'=>$this->sectionClass->generateAdmissionNo(),
                    'section_class_id'=>$this->sectionClass->id,
                    'academic_session_id'=>$this->sectionClass->classAdmissionSession()->id,
                    'gender_id'=>$this->getGenderId($row[6])
                ]);

                $classStudent = $student->sectionClassStudents()->create(['section_class_id'=>$this->sectionClass->id]);
                
                $count = 1;
                foreach($student->currentSession()->academicSessionTerms as $academicSessionTerm){
                    if($count == 1){
                        $academicSessionTerm->sectionClassStudentTerms()->create(['status'=>'Active','section_class_student_id'=>$classStudent->id]);
                    }else{
                        $academicSessionTerm->sectionClassStudentTerms()->create(['section_class_student_id'=>$classStudent->id]);
                    }
                    $count++;
                }
            }
        }

        
    }

    public function getDate($date)
    {
        if(!$date){
            $date = '12/12/2020';
        }
        return $date;
    }
    public function getGenderId($gender)
    {
        
        switch (substr($gender,0,1)) {
            case 'M':
                $genderId = 1;
                break;
            case 'F':
                $genderId = 2;
                break;
            case 'm':
                $genderId = 1;
                break;
            case 'f':
                $genderId = 2;
                break;
            default:
                $genderId = 3;
                break;
        }
        return $genderId;
    }
}
