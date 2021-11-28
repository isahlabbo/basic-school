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

    public function sectionClassSubjects()
    {
        return $this->hasMany(SectionClassSubject::class);
    }

    public function sectionClassTeachers()
    {
        return $this->hasMany(SectionClassTeacher::class);
    }

    public function activeClassTeacher()
    {
        $teacher = null;
        foreach($this->sectionClassTeachers as $teacher){
            if($teacher->status == 'Active'){
                return $teacher;
            }
        }
        return $teacher;
    }

    public function currentStudents()
    {
        $students = [];
        foreach ($this->sectionClassStudents->where('status','Active') as $classStudent) {
            $students[] = $classStudent->student;
        }
        return $students;
    }

    public function generateAdmissionNo()
    {
        return 'WFIA/'.$this->code.'/'.substr($this->currentSession()->name,2,2).'/'.$this->formatSerialNo(count($this->sectionClassStudents->where('status','Active'))+1);
    }

    public function formatSerialNo($number)
    {
        if($number < 10){
            $number = '00'.$number;
        }elseif($number < 100){
            $number = '0'.$number;
        }
        return $number;
    }
}
