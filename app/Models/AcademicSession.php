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

    public function sectionClassStudentRepeatings ()
    {
        return $this->hasMany(SectionClassStudentRepeating::class);
    }

    public function sectionStudentGraduations ()
    {
        return $this->hasMany(SectionStudentGraduation::class);
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function classAdmissions(SectionClass $class)
    {
        return $this->students->where('section_class_id',$class->id);
    }

    public function sectionClassReservedAdmissionNos()
    {
        return $this->hasMany(SectionClassReservedAdmissionNo::class);
    }

    public function updateNextTerm($term)
    {
        foreach ($this->academicSessionTerms as $academicSessionTerm) {
            if($term->id + 1 == $academicSessionTerm->term->id){
                $academicSessionTerm->update(['status'=>'Active']);
            }elseif ($term->id == $academicSessionTerm->term->id) {
                $academicSessionTerm->update(['status'=>'Not Active']);
            }
        }
    }

    public function nextAcademicSessionTerm($term)
    {
        foreach ($this->academicSessionTerms as $academicSessionTerm) {
            if($term->id + 1 == $academicSessionTerm->term->id){
                return $academicSessionTerm;
            }
        }
    }
    
}
