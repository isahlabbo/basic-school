<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudentTerm extends BaseModel
{
    public function sectionClassStudentTermResultPublish()
    {
        return $this->hasOne(SectionClassStudentTermResultPublish::class);
    }
    public function studentResults()
    {
        return $this->hasMany(StudentResult::class);
    }

    public function studentTermTotalScore()
    {
        $total = 0;
        foreach($this->studentResults as $studentResult){
            $total = $total+$studentResult->total;
        }
        return $total;
    }
    
    public function sectionClassStudent()
    {
        return $this->belongsTo(SectionClassStudent::class);
    }

    public function academicSessionTerm()
    {
        return $this->belongsTo(AcademicSessionTerm::class);
    }

    public function sectionClassStudentTermAccessment()
    {
        return $this->hasOne(SectionClassStudentTermAccessment::class);
    }

    public function studentAverage()
    {
        $total = 0;
        $count = 0;
        foreach($this->studentResults as $result){
            $count++;
            $total = $total + $result->total;
        }
        if($count == 0){
            $count = 1;
        }
        
        return number_format($total/$count,2);
    }
}
