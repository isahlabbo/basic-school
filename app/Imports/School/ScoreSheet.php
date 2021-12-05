<?php

namespace App\Imports\School;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SectionClassSubject;
use App\Models\SubjectTeacherTermlyUpload;
use App\Models\Term;
use App\Models\Student;

class ScoreSheet implements ToModel
{
    protected $sectionClassSubject;

    public function __construct(SectionClassSubject $classSubject, Term $term)
    {
        $this->sectionClassSubject = $classSubject;
        $this->term = $term;
    }
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        if($row[2] != "Admission No" && $this->getThisStudent($row[2])){
            
            $subjectTeacherTermlyUpload = SubjectTeacherTermlyUpload::firstOrCreate([
                'term_id'=>$this->term->id,
                'section_class_subject_teacher_id'=>$this->sectionClassSubject->activeSectionClassSubjectTeacher()->id,
            ]);
            
            $result = $subjectTeacherTermlyUpload->studentResults()->firstOrCreate([
                'section_class_student_term_id'  => $this->getThisStudent($row[2])->sectionClassStudents->where('status','Active')->first()->sectionClassStudentTerms->where('status','Active')->first()->id,
                ]);
            $result->update([ 
                'first_ca' => $row[3],
                'second_ca' => $row[4],
                'exam' => $row[5],
                'total' => $row[4] + $row[5] + $row[3],
                'grade' => $this->computeGrade($row[3],$row[4], $row[5]),
            ]);    
        }
    }
    
    public function computeGrade($ca1, $ca2, $exam)
    {
        $total = $ca1 + $ca2 + $exam;
        $grade = 'F';
        if($total >= 70){
            $grade = 'A';
        }elseif($total >=60){
            $grade = 'B';
        }elseif($total >=50){
            $grade = 'C';
        }elseif($total >=45){
            $grade = 'D';
        }elseif($total >=40){
            $grade = 'E';
        }
        return $grade;
    }

    public function getThisStudent($admissionNo)
    {
        return Student::where('admission_no',$admissionNo)->first();
    }
}
