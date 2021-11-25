<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassSubject extends BaseModel
{
    public function sectionClassSubjectTeachers()
    {
        return $this->hasMany(SectionClassSubjectTeacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function activeSectionClassSubjectTeacher()
    {
        $sectionClassSubjectTeacher = null;
        foreach ($this->sectionClassSubjectTeachers->where('status','Active') as $sectionClassSubjectTeacher) {
            return $sectionClassSubjectTeacher;
        }
        return $sectionClassSubjectTeacher;
    }
}
