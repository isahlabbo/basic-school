<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassSubjectTeacher extends BaseModel
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function sectionClassSubject()
    {
        return $this->belongsTo(SectionClassSubject::class);
    }
}
