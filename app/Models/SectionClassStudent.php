<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudent extends BaseModel
{
    public function studentResults()
    {
        return $this->hasMany(StudentResult::class);
    }

    public function sectionClass(Type $var = null)
    {
        return $this->belongsTo(SectionClass::class);
    }
    public function sectionClassStudentTerms ()
    {
        return $this->hasMany(SectionClassStudentTerm::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function currentStudentTerm()
    {
        return $this->sectionClassStudentTerms->where('status','Active')->first();
    }

}
