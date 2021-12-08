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

    public function sectionClass(Type $var = null)
    {
        return $this->belongsTo(SectionClass::class);
    }
    public function sectionClassStudentTerms ()
    {
        return $this->hasMany(SectionClassStudentTerm::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function currentStudentTerm()
    {
        return $this->sectionClassStudentTerms->where('status','Active')->first();
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
    public function nextSectionClassStudentTerm()
    {
        switch ($this->currentStudentTerm()->academicSessionTerm->term_id) {
            case '1':
                // second term
                foreach($this->sectionClassStudentTerms as $sectionClassStudentTerm){
                    if($sectionClassStudentTerm->academicSessionTerm->term_id == 2){
                        $sectionTerm = $sectionClassStudentTerm;
                    }
                }
                break;
            case '2':
                // third term
                foreach($this->sectionClassStudentTerms as $sectionClassStudentTerm){
                    if($sectionClassStudentTerm->academicSessionTerm->term_id == 3){
                        $sectionTerm = $sectionClassStudentTerm;
                    }
                }
                break;
            
            default:
                # code...
                break;
        }
        
        return $sectionTerm;
    }
    public function totalExamScore($term)
    {
        $total = 0;
        foreach ($this->sectionClassStudentTerms as $sectionClassStudentTerm) {
            if($sectionClassStudentTerm->academicSessionTerm->term->id == $term->id){
                foreach ($sectionClassStudentTerm->studentResults as $studentResult) {
                    $total = $total + $studentResult->total;
                }
            }
        }
        return $total;
    }

}
