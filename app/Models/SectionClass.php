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
    public function studentPosition($sectionClassStudentTerm)
    {
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
        foreach ($this->sectionClassStudents as $sectionClassStudent) {
            foreach($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm){
                if($term->id == $sectionClassStudentTerm->academicSessionTerm->term->id){
                    $count++;
                    $classStudentAverages = $classStudentAverages + $sectionClassStudentTerm->studentAverage();
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

    public function generateAdmissionNo()
    {

        return config('app.code').'/'.$this->getAdmissionYear().$this->code.'/'.$this->getAdmissionSerialNo();
    }

    public function getAdmissionSerialNo()
    {
        return $this->formatSerialNo(count($this->classAdmissionSession()->classAdmissions($this))+1);
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
            $begin = substr($sectionClassStudent->student->admission_no,0,12);
            $newNo =$begin.$this->formatSerialNo($count);
            $sectionClassStudent->student->update(['admission_no'=>$newNo]);
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
