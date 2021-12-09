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
        $total = 0;
        $first_ca = $this->_second_ca;
        $second_ca = $this->second_ca;
        $exam = $this->exam;
        if(is_numeric($first_ca)){
            $total = $total+$first_ca;
        }
        if(is_numeric($second_ca)){
            $total = $total+$second_ca;
        }
        if(is_numeric($exam)){
            $total = $total+$exam;
        }else{
            $total = 'Absent';
        }
        $this->update(['total'=>$total]);
        $this->reComputeGrade();
    }
    public function reComputeGrade()
    {
        $total = $this->total;
        if(is_numeric($total)){
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
        }else{
            $grade = $this->total;
        }    
        $this->update(['grade'=>$grade]);
    }
    public function effort()
    {
        $effort = null;

        switch ($this->grade) {
            case 'A':
                $effort = 5;
                break;
            case 'B':
                $effort = 4;
                break;
            case 'C':
                $effort = 3;
                break;
            case 'D':
                $effort = 2;
                break;
            case 'D':
                $effort = 1;
                break;        
            default:
                $effort = 0;
                break;
        }
        return $effort;
    }

    public function remark()
    {
        switch ($this->grade) {
            case 'A':
                $remark = 'Distinction';
                break;
            case 'B':
                $remark = 'Excellence';
                break;
            case 'C':
                $remark = 'Very Good';
                break;
            case 'D':
                $remark = 'Good';
                break;
            case 'E':
                $remark = 'Fair';
                break;
            default:
                $remark = 'Foor';
                break;
        }
        return $remark;
    }
}
