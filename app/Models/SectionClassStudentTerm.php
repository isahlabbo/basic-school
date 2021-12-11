<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudentTerm extends BaseModel
{
    public function studentResults()
    {
        return $this->hasMany(StudentResult::class);
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
        
        return number_format($total/$count,2);
    }
}
