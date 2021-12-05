<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSession extends BaseModel
{
    public function academicSessionTerms()
    {
        return $this->hasMany(AcademicSessionTerm::class);
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function classAdmissions(SectionClass $class)
    {
        return $this->students->where('section_class_id',$class->id);
    }
}
