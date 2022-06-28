<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudentTermResultPublish extends BaseModel
{
    public function sectionClassStudentTerm()
    {
        return $this->belongsTo(SectionClassStudentTerm::class);
    }
}
