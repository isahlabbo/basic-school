<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassSubject extends BaseModel
{
    public function sectionClassSubjectTeachers()
    {
        return $this->hasMany(SectionClassSubjectTeacher::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function sectionClassSubjectDownloads()
    {
        return $this->hasMany(SectionClassSubjectDownloads::class);
    }

    public function sectionClassSubjectUploads()
    {
        return $this->hasMany(SectionClassSubjectUploads::class);
    }

    public function examSubjectQuestionSections()
    {
        return $this->hasMany(ExamSubjectQuestionSection::class);
    }

    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }
    public function currentExam()
    {
        return $this->sectionClass->sectionClassTermlyExams->where('academic_session_term_id',$this->currentSessionTerm()->id)->first();
    }
    public function currentQuestionSections()
    {
        return $this->examSubjectQuestionSections->where('section_class_termly_exam_id', $this->currentExam()->id);
    }

    public function availableResultUploads()
    {
        $uploads = [];
        foreach ($this->sectionClassSubjectTeachers as $classTeacher) {
            foreach($classTeacher->subjectTeacherTermlyUploads->where('term_id',$this->currentSessionTerm()->term->id) as $upload){
                $uploads[] = $upload;
            }
        }
        return $uploads;
    }

    public function hasCurrentTermUpload()
    {
        $flag = false;
        foreach($this->activeSectionClassSubjectTeacher()->subjectTeacherTermlyUploads->where('academic_session_term_id',$this->currentSessionTerm()->id) as $upload){
           return $upload;
        }
        return $flag;
    }
    
    public function activeSectionClassSubjectTeacher()
    {
        $sectionClassSubjectTeacher = null;
        foreach ($this->sectionClassSubjectTeachers->where('status','Active') as $sectionClassSubjectTeacher) {
            return $sectionClassSubjectTeacher;
        }
        return $sectionClassSubjectTeacher;
    }
}
