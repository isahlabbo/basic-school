<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClass extends BaseModel
{
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function sectionClassStudents()
    {
        return $this->hasMany(SectionClassStudent::class);
    }
}
