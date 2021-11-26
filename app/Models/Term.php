<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends BaseModel
{
    public function termSubjectResults()
    {
        return $this->hasMany(TermSubjectResult::class);
    }

    public function subjectTeacherTermylUpload()
    {
        return $this->hasMany(SubjectTeacherTermlyUpload::class);
    }
}
