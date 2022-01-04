<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClassStudent extends BaseModel
{
    
    public function sectionClass(Type $var = null)
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function sectionClassStudentTerms ()
    {
        return $this->hasMany(SectionClassStudentTerm::class);
    }

    public function sectionClassStudentPayments ()
    {
        return $this->hasMany(SectionClassStudentPayment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function currentStudentTerm()
    {
        return $this->sectionClassStudentTerms->where('status','Active')->first();
    }

    public function expectedScore(Type $var = null)
    {
        return count($this->sectionclass->sectionClassSubjects) * 100;
    }
    public function averageScore()
    {
        $total = 0;
        $count = 0;
        foreach ($this->sectionClassStudentTerms as $sectionClassStudentTerm) {
            $total += $sectionClassStudentTerm->studentTermTotalScore;
            $count ++;
        }
        if($count == 0){
            $count = 1;
        }
        return $total/$count;
    }

    public function promoteToNextClass()
    {
        if(100 * ($this->averageScore/$this->expectedScore) >= $this->sectionClass->pass_mark){
            foreach($this->sectionClassStudentTerms as $sectionClassStudentTerm){
                $sectionClassStudentTerm->update(['status'=>'Not Active']);
            }
            $this->update(['status','Not Active']);
            // find the next class and activate for the student
            $newStudentClass = $this->student->sectionClassStudents()->create(['section_class_id'=>$this->sectionClass->nextClass()->id]);
            foreach([1,2,3] as $term){
                if($term ==1){
                    $newStudentClass->sectionClassStudentTerms()->create(['term_id'=>$term,'status'=>'Active']);
                }else{
                    $newStudentClass->sectionClassStudentTerms()->create(['term_id'=>$term,'status'=>'Not Active']);
                }
            }
            
        }else{
            // repeat the class
        }
    }

    public function paidAmount($term)
    {
        $amount = 0;
        foreach ($this->SectionClassStudentPayments->where('term_id',$term->id) as $payment) {
            $amount = $amount + $payment->amount;
        }
        return $amount;
    }

    public function feeAmount($term)
    {
        $amount = 0;
        foreach ($this->SectionClass->sectionClassPayments->where('term_id',$term->id) as $payment) {
            if($payment->gender = $this->student->gender || $payment->gender == 3){
                $amount = $amount + $payment->amount;
            }
        }
        return $amount;
    }

    public function updateActiveTerm()
    {
        
        foreach($this->sectionClassStudentTerms as $sectionClassStudentTerm){
            
            if($sectionClassStudentTerm->academicSessionTerm->term->id == $this->currentSessionTerm()->term->id){
                $sectionClassStudentTerm->update(['status'=>'Active']);
            }else{
                $sectionClassStudentTerm->update(['status'=>'No Active']);
            }
        }
       
    }

    public function nextSectionClassStudentTerm()
    {
        foreach($this->sectionClassStudentTerms as $sectionClassStudentTerm){
            if($sectionClassStudentTerm->academicSessionTerm->term_id == $this->currentSessionTerm()->term_id + 1){
                return $sectionClassStudentTerm;
            }
        }
    }
    public function totalExamScore($term)
    {
        $total = 0;
        foreach ($this->sectionClassStudentTerms as $sectionClassStudentTerm) {
            if($sectionClassStudentTerm->academicSessionTerm->term->id == $term->id){
                foreach ($sectionClassStudentTerm->studentResults as $studentResult) {
                    if(is_numeric($studentResult->total)){
                        $total = $total + $studentResult->total;
                    }
                }
            }
        }
        return $total;
    }

}
