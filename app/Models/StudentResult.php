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
            $grade = 'Absent';
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
                $remark = 'Excellence';
                break;
            case 'B':
                $remark = 'Very Good';
                break;
            case 'C':
                $remark = 'Good';
                break;
            case 'D':
                $remark = 'Pass';
                break;
            case 'E':
                $remark = 'Fair';
                break;
            default:
                $remark = 'Poor';
                break;
        }
        return $remark;
    }
}
