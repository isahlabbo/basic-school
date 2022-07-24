<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends BaseModel
{
    
    public function sectionClasses()
    {
        return $this->hasMany(SectionClass::class);
    }

    public function psychomotors()
    {
        return $this->hasMany(Psychomotor::class);
    }

    public function affectiveTraits()
    {
        return $this->hasMany(AffectiveTrait::class);
    }

    public function sectionStudentGraduations ()
    {
        return $this->hasMany(SectionStudentGraduation::class);
    }

    public function nextSection()
    {
        return Section::where('level',$this->level+1)->get();
    }
    public function sectionReports()
    {
        $report = 0;
        foreach($this->sectionClasses as $sectionClass){
            $report += count($sectionClass->classReports());
        }
        return $report;
    }
    public function subjectResultUploads()
    {
        $uploadedResult = [];
        $awaitingResult = [];
        
        foreach ($this->sectionClasses as $sectionClass) {
            $uploadedResult = array_merge($sectionClass->subjectResultUploads()['uploaded'],$uploadedResult);
            $awaitingResult = array_merge($sectionClass->subjectResultUploads()['awaiting'],$awaitingResult);
        }

        return ['uploaded' => $uploadedResult, 'awaiting' => $awaitingResult];
    }

    public function yearSequences()
    {
        $sequences = [];
        for ($sequence=1; $sequence <= $this->duration ; $sequence++) { 
            switch ($sequence) {
                case '1':
                    $sequences[] = 'First';
                    break;
                case '2':
                    $sequences[] = 'Second';
                    break;
                case '3':
                    $sequences[] = 'Third';
                    break;
                case '4':
                    $sequences[] = 'Forth';
                    break;
                case '5':
                    $sequences[] = 'Fifth';
                    break;
                case '6':
                    $sequences[] = 'Sixth';
                    break;
                default:
                    break;
            }
        }
        return $sequences;
    }

    public function getYearSequence()
    {
        $sequence = null;

        foreach($this->sectionClasses as $sectionClass){
            $sequence = $sectionClass->year_sequence;
        }
        if($sequence){
            switch ($sequence) {
                case 'First':
                    $sequence = 'Second';
                    break;
                case 'Second':
                    $sequence = 'Third';
                    break;
                case 'Third':
                    $sequence = 'Forth';
                    break;
                case 'Forth':
                    $sequence = 'Fifth';
                    break;
                case 'Fifth':
                    $sequence = 'Sixth';
                    break;
                
                default:
                    $sequence = 'Seventh';
                    break;
            }
        }else{
            $sequence = 'First';
        }
        return $sequence;
    }
}
