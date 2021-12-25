<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends BaseModel
{
    public function sectionClassStudentTerm()
    {
        return $this->belongsTo(SectionClassStudentTerm::class);
    }

    public function subjectTeacherTermlyUpload()
    {
        return $this->belongsTo(SubjectTeacherTermlyUpload::class);
    }
    public function updateTotalAndComputeGrade()
    {
        $this->update(['total'=>$this->first_ca+ $this->second_ca+$this->exam]);
        $this->reComputeGrade();
    }
    public function reComputeGrade()
    {
        $total = $this->total;
        
        if($total > 0){
            foreach(GradeScale::all() as $gradeScale){
                if($this->total >= $gradeScale->from && $this->total <= $gradeScale->to){
                    $grade = $gradeScale->grade;
                }
            }
        }else{
            $grade = 'Absent';
        }    
        $this->update(['grade'=>$grade]);
    }
    public function effort()
    {
        
        foreach (RemarkScale::all() as $remarkScale) {
           if($remarkScale->grade == $this->grade){
               return $remarkScale->scale;
           }
        }
    }

    public function remark()
    {
        foreach (RemarkScale::all() as $remarkScale) {
            if($remarkScale->grade == $this->grade){
                return $remarkScale->remark;
            }
        }
    }
}
