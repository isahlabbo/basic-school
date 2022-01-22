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

    public function getYearSequence()
    {
        $sequence = null;

        foreach($this->sectionClasses as $sectionClass){
            $sequence = $sectionClass->year_sequence;
        }
        if($sequence){
            switch ($sequence) {
                case 'First':
                    $squence = 'Second';
                    break;
                case 'Second':
                    $squence = 'Third';
                    break;
                case 'Third':
                    $squence = 'Forth';
                    break;
                case 'Forth':
                    $squence = 'Fifth';
                    break;
                case 'Fifth':
                    $squence = 'Sixth';
                    break;
                
                default:
                    $squence = 'Seventh';
                    break;
            }
        }else{
            $sequence = 'First';
        }
        return $sequence;
    }
}
