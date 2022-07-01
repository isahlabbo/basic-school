<?php
namespace App\Services\Publish;

trait PublishAble
{
   
    public function position()
    {
        $allStudentsScoreInTheClass = [];
        foreach($this->sectionClassStudent->sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent){
            foreach($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm){
                if(count($sectionClassStudentTerm->studentResults) > 0 && $sectionClassStudentTerm->academicSessionTerm->term->id == $this->academicSessionTerm->term->id){
                    $allStudentsScoreInTheClass[] = $sectionClassStudentTerm->studentTermTotalScore();
                }
            }
        }
    
        // remove the duplicate score from the array
        array_unique($allStudentsScoreInTheClass);
    
        // sort array decending order
        rsort($allStudentsScoreInTheClass);
        foreach($allStudentsScoreInTheClass as $key => $value){
            if($this->studentTermTotalScore() == $value){
                return $this->getValidPositionName(($key+1));
            }
        }
    }

    public function obtainMarks()
    {
        return $this->studentTermTotalScore();
    }

    public function totalMarks()
    {
        return count($this->sectionClassStudent->sectionClass->sectionClassSubjects) * 100;
    }

    public function classAverage()
    {
        return $this->sectionClassStudent->sectionClass->classAverage($this->academicSessionTerm->term);
    }

    public function studentAverage()
    {
        return $this->studentAverage();
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

    
}
