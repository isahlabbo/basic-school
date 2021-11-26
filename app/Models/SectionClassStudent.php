<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudent extends BaseModel
{
    public function studentResults()
    {
        return $this->hasMany(StudentResult::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
