<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSessionTerm extends BaseModel
{
    public function academicSession(Type $var = null)
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function term(Type $var = null)
    {
        return $this->belongsTo(Term::class);
    }

    public function sectionClassStudentTerms()
    {
        return $this->hasMany(SectionClassStudentTerm::class);
    }

}
