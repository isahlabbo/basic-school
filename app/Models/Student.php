<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends BaseModel
{
    public function sectionClassStudents()
    {
        return $this->hasMany(SectionClassStudent::class);
    }

    public function activeSectionClass()
    {
        $sectionClass = null;
        foreach($this->sectionClassStudents->where('status', 'active') as $sectionClassStudent){
            $sectionClass = $sectionClassStudent->sectionClass;
        }
        return $sectionClass;
    }

    public function guardian(Type $var = null)
    {
        return $this->belongsTo(Guardian::class);
    }

}
