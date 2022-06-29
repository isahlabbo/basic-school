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

    public function updatePublishRecord()
    {
        $this->update([
            'position' => $this->sectionClassStudentTerm->sectionClassStudent->sectionClass->studentPosition($this->sectionClassStudentTerm),
            'total_marks' => count($this->sectionClassStudentTerm->sectionClassStudent->sectionClass->sectionClassSubjects) * 100,
            'obtain_marks' => $this->sectionClassStudentTerm->studentTermTotalScore(),
            'class_average' => $this->sectionClassStudentTerm->sectionClassStudent->sectionClass->classAverage($this->sectionClassStudentTerm->academicSessionTerm->term),
            'student_average' => $this->sectionClassStudentTerm->studentAverage(),
        ]);
    }
}
