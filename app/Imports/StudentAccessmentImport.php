<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Student;
use App\Models\SectionClass;

class StudentAccessmentImport implements ToModel
{
    protected $sectionClass;

    public function __construct(SectionClass $classClass)
    {
        $this->sectionClass = $classClass;
    }

    public function model(array $row)
    {
        
        if($row[0] != 'NAME'){
            $sectionClassStudentTerm = $this->getThisStudentSessionTerm($row[1]);
            
            if($sectionClassStudentTerm){
                $sectionClassStudentTerm->sectionClassStudentTermAccessment()->firstOrCreate([
                "punctuality" => $row[2],
                "attendance" => $row[3],
                "reliability" => $row[4],
                "neatness" => $row[5],
                "politeness" => $row[6],
                "honesty" => $row[7],
                "relationship_with_pupils" => $row[8],
                "self_control" => $row[9],
                "attentiveness" => $row[10],
                "perseverance" => $row[11],
                "handwriting" => $row[12],
                "games" => $row[13],
                "sports" => $row[14],
                "drawing_and_painting" => $row[15],
                "crafts" => $row[16],
                "days_school_open" => $row[17],
                "days_present" => $row[18],
                "days_absent" => $row[19],
                "teacher_comment_id" => $row[20],
                "head_teacher_comment_id" => $row[21]
                ]);
            }
            
        }
    }

    public function getThisStudentSessionTerm($admissionNo)
    {
        $student = Student::where('admission_no',$admissionNo)->first();
        $studentClass = $student->sectionClassStudents->where('status','Active')->first();
        return $studentClass->sectionClassStudentTerms->where('status','Active')->first();
    }
}
