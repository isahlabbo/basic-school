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

    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function activeSectionClass()
    {
        $sectionClass = null;
        foreach($this->sectionClassStudents->where('status', 'Active') as $sectionClassStudent){
            $sectionClass = $sectionClassStudent->sectionClass;
        }
        return $sectionClass;
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function gender()
    {
        $gender = 'Male';
        if($this->gender==2){
            $gender = 'Female';
        }
        return $gender;
    }

}
