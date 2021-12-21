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
        $data = $row;

        if($row[0] != 'NAME'){
            $sectionClassStudentTerm = $this->getThisStudentSessionTerm($row[1]);
            if($sectionClassStudentTerm){
                $accessment = $sectionClassStudentTerm->sectionClassStudentTermAccessment;
                if($accessment){
                    $accessment->update([
                        "days_school_open" => $row[2],
                        "days_present" => $row[3],
                        "days_absent" => $row[4],
                        "teacher_comment_id" => $row[5],
                        "head_teacher_comment_id" => $row[6]
                    ]);
                    foreach ($data as $key => $value) {
                        foreach ($accessment->sectionClassStudentTermAccessmentPsychomotors as $accessmentPsycho) {
                            if($accessmentPsycho->psychomotor->name == $value){
                                $accessmentPsycho->update(['value'=>$row[$key]]);
                            }
                        }
                        
                        foreach ($accessment->sectionClassStudentTermAccessmentAffectiveTraits as $accessmentTrait) {
                            if($accessmentTrait->affectiveTrait->name == $value){
                                $accessmentTrait->update(['value'=>$row[$key]]);
                            }
                        }
                    } 
                }else{
                   $accessment = $sectionClassStudentTerm->sectionClassStudentTermAccessment()->firstOrCreate([
                        "days_school_open" => $row[2],
                        "days_present" => $row[3],
                        "days_absent" => $row[4],
                        "teacher_comment_id" => $row[5],
                        "head_teacher_comment_id" => $row[6]
                        ]);
                        foreach ($data as $key => $value) {
                            $psycho = Psychomotor::where('name',$value)->first();
                            if($psycho){
                                $accessment->sectionClassStudentTermAccessmentPsychomotors()->create([
                                    'psychomotor_id'=>$psycho->id,
                                    'value'=>$row[$key],
                                    ]);
                            }

                            $trait = AffectiveTrait::where('name',$value)->first();
                            if($trait){
                                $accessment->sectionClassStudentTermAccessmentAffectiveTraits()->create([
                                    'affective_trait_id'=>$trait->id,
                                    'value'=>$row[$key],
                                    ]);
                            }
                        }    
                }
            }
            
        }
    }
    public function getData($array)
    {
        return $array;
    }
    public function getThisStudentSessionTerm($admissionNo)
    {
        $student = Student::where('admission_no',$admissionNo)->first();
        if($student){
            $studentClass = $student->sectionClassStudents->where('status','Active')->first();
        }
        if($studentClass){
            return $studentClass->sectionClassStudentTerms->where('status','Active')->first();
        }
        return null;
    }
}
