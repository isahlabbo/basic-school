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

    public function sectionClassPayments()
    {
        return $this->hasMany(SectionClassPayment::class);
    }

    public function sectionClassSubjects()
    {
        return $this->hasMany(SectionClassSubject::class);
    }

    public function sectionClassTeachers()
    {
        return $this->hasMany(SectionClassTeacher::class);
    }

    public function nextClass()
    { 
        $year = null;
        
        switch ($this->year_sequence) {
            case 'First':
                $year = 'Second';
                break;
            case 'Second':
                $year = 'Third';
                break;    
            case 'Third':
                $year = 'Forth';
                break;
            case 'Forth':
                $year = 'Forth';
                break;
            case 'Fifth':
                $year = 'Sixth';
                break;        
            default:
                # code...
                break;
        }
        if($year){
            foreach($this->section->sectionClasses as $sectionClass){
                if($sectionClass->year_sequence == $year){
                    return $sectionClass;
                }
            }
        }
        return $year;
    }

    public function updateAllStudentTerm()
    {
        foreach ($this->sectionClassStudents->where('status','Active') as $sectionClassStudent) {
            $sectionClassStudent->updateNextTerm();
        }
    }

    public function studentPosition($sectionClassStudentTerm)
    {
        if(config('app.nursery_class_position') == true && $this->section->name == 'NURSERY'){
            $score = $sectionClassStudentTerm->studentTermTotalScore();
            $totalMarks = count($this->sectionClassSubjects)*100;
            $percentage = 100 * ($score/$totalMarks);
            
            if($percentage >= 90){
                $position = 'Distinction';
            }elseif ($percentage >= 70) {
                $position = 'Excellent';
            }elseif ($percentage >= 60) {
                $position = 'Very Good';
            }elseif ($percentage >= 50) {
                $position = 'Good';
            }elseif ($percentage >= 40) {
                $position = 'Pass';
            }else {
                $position = 'Poor';
            }
            return $position;
        }else{
            $studentScores = [];
            foreach($this->sectionClassStudents->where('status','Active') as $sectionClassStudent){
                $studentScores[] = $sectionClassStudent->totalExamScore($sectionClassStudent->currentStudentTerm()->academicSessionTerm->term);
            }
            
            // remove the duplicate score from the array
            array_unique($studentScores);
        
            // sort array decending order
            rsort($studentScores);
            foreach($studentScores as $key => $value){
                if($sectionClassStudentTerm->sectionClassStudent->totalExamScore($sectionClassStudentTerm->academicSessionTerm->term) == $value){
                    return $this->getValidPositionName(($key+1));
                }
            }
        }
    }

    public function getValidPositionName($position)
    {
        switch ($position) {
            case '1':
                $position = $position.'ST';
                break;
            case '2':
                $position = $position.'ND';
                break;
            case '3':
                $position = $position.'RD';
                break;
            case '21':
                $position = $position.'ST';
                break;
            case '22':
                $position = $position.'ND';
                break;
            case '23':
                $position = $position.'RD';
                break;
            case '31':
                $position = $position.'ST';
                break;
            case '32':
                $position = $position.'ND';
                break;
            case '33':
                $position = $position.'RD';
                break;  
            case '41':
                $position = $position.'ST';
                break;
            case '42':
                $position = $position.'ND';
                break;
            case '43':
                $position = $position.'RD';
                break;           
            default:
                $position = $position.'TH';
                break;
        }
        return $position;
    }
    public function classAverage($term)
    {
        $classStudentAverages = 0;
        $count = 0;
        foreach ($this->sectionClassStudents->where('status','Active') as $sectionClassStudent) {
            foreach($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm){
                if($term->id == $sectionClassStudentTerm->academicSessionTerm->term->id){
                    $classStudentAverages = $classStudentAverages + $sectionClassStudentTerm->studentAverage();
                    $count++;
                }
            }
        }
        return number_format($classStudentAverages/$count,2);
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

    public function generateAdmissionNo($number = null)
    {
        return config('app.code').'/'.$this->getAdmissionYear().$this->code.'/'.$this->getAdmissionSerialNo($number);
    }

    public function getAdmissionSerialNo($number)
    {
        return $this->formatSerialNo($number ?? count($this->classAdmissionSession()->classAdmissions($this))+1);
    }

    public function classAdmissionSession()
    {
        $start = $this->getAdmissionYear();
        $end = $start+1;
        return AcademicSession::firstOrCreate(['name'=>$start.'/'.$end]);
    }

    public function getAdmissionYear()
    {
        
        $currentYear = date('Y');
        if($currentYear == substr($this->currentSession()->name,'5',)){
            $currentYear = $currentYear - 1;
        }
        
        $year = null;
        switch ($this->year_sequence) {
            case 'First':
                $year = $currentYear;
                break;
            case 'Second':
                $year = $currentYear - 1;
                break;
            case 'Third':
                $year = $currentYear - 2;
                break;
            case 'Forth':
                $year = $currentYear - 3;
                break;
            case 'Fifth':
                $year = $currentYear - 4;
                break;
            case 'Sixth':
                    $year = $currentYear - 5;
                    break;            
            default:
                $year = $currentYear;
                break;
        }
        return $year;
    }

    public function updateAdmissionNo()
    {
        $count = 1;
        foreach ($this->sectionClassStudents->where('status','Active') as $sectionClassStudent) {
            $sectionClassStudent->student->update(['admission_no'=>$this->generateAdmissionNo($count)]);
            $count++;
        }
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

    public function availableResultUploads(Type $var = null)
    {
        $uploadCounts = 0;
        foreach($this->sectionClassSubjects as $sectionClassSubject){
            $uploadCounts = $uploadCounts + count($sectionClassSubject->availableResultUploads());
        }
        return $uploadCounts;
    }
}
