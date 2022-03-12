<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
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

    public function profileImage()
    {
        return Storage::url($this->picture);
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
        return $this->belongsTo(Gender::class);
    }

    public function assignToThisClass($sectionClassId,$status)
    {
        $studentClass = $this->sectionClassStudents()->create(['status'=>$status,'section_class_id'=>$sectionClassId]);
        foreach($this->currentSession()->academicSessionTerms as $academicSessionTerm){
            $studentTerm = $studentClass->sectionClassStudentTerms()->create(['academic_session_term_id'=>$academicSessionTerm->id]);
            if($studentTerm->academicSessionTerm->term->id == $this->currentSessionTerm()->term->id){
                $studentTerm->update(['status'=>'Active']);
            }
        }
    }

    public function repeatThisClass($sectionClassId,$status)
    {
        $this->sectionClassStudents->where('section_class_id',$this->activeSectionClass()->id)->update(['status'=>'Not Active']);
        
        $studentClass = $this->sectionClassStudents()->create(['status'=>$status,'section_class_id'=>$sectionClassId]);
        foreach($this->currentSession()->academicSessionTerms as $academicSessionTerm){
            $studentTerm = $studentClass->sectionClassStudentTerms()->create(['academic_session_term_id'=>$academicSessionTerm->id]);
            if($studentTerm->academicSessionTerm->term->id == $this->currentSessionTerm()->term->id){
                $studentTerm->update(['status'=>'Active']);
            }
        }
    }


}
