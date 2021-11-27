<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacherTermlyUpload extends BaseModel
{
    public function sectionClassSubjectTeacher()
    {
        return $this->belongsTo(SectionClassSubjectTeacher::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
        
    }

    public function studentResults()
    {
        return $this->hasMany(StudentResult::class);
    }

    public function gradePercentage($grade)
    {
        
        return 100 * ($this->gradeCount($grade)/count($this->studentResults));
    }

    public function gradeCount($grade)
    {
        return count($this->studentResults->where('grade',$grade));
    }

    public function position($total)
    {
        $scoreBoard = [];
        foreach ($this->studentResults as $studentResult) {
            $scoreBoard[] = $studentResult->total;
        }
        
        // remove the duplicate score from the array
        array_unique($scoreBoard);
       
        // soret array decending order
        rsort($scoreBoard);
        foreach($scoreBoard as $key => $value){
            if($total == $value){
                return ($key+1);
            }
        }
    }
}
