<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends BaseModel
{
    public function sectionClassStudent()
    {
        return $this->belongsTo(SectionClassStudent::class);
    }

    public function subjectTeacherTermlyUpload()
    {
        return $this->belongsTo(SubjectTeacherTermlyUpload::class);
    }

    public function reComputeGrade()
    {
        $total = $this->total;

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
        $this->update(['grade'=>$grade]);
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
                $remark = 'Fair';
                break;
            case 'E':
                $remark = 'Poor';
                break;
            default:
                $remark = 'Fair';
                break;
        }
        return $remark;
    }
}
