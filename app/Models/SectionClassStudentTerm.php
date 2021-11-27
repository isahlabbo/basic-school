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
}
