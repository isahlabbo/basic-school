<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassTermlyExam extends Model
{
    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
