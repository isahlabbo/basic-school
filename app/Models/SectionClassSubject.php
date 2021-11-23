<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassSubject extends BaseModel
{
    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
