<?php
namespace App\Services\Publish;

trait PublishedResult
{
   
    public function publishedPosition()
    {
        if($this->academicSessionTerm->term->id == 3){
            $allStudentsScoreInTheClass = [];
            foreach($this->sectionClassStudent->sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent){
                $allStudentsScoreInTheClass[] = $sectionClassStudent->pulishedResultAverage();
            }
            // remove the duplicate score from the array
            array_unique($allStudentsScoreInTheClass);
        
            // sort array decending order
            rsort($allStudentsScoreInTheClass);
            foreach($allStudentsScoreInTheClass as $key => $value){
                if($this->sectionClassStudent->pulishedResultAverage() == $value){
                    return $this->getValidPositionName(($key+1));
                }
            }
        }else{
            $posiotion = $this->sectionClassStudentTermResultPublish->position;
        }
    }

    public function publishedObtainMarks()
    {
        if($this->academicSession->term->id == 3){
            $obtainMarks = $this->sectionClassStudent->pulishedResultAverage;
        }else{
            $obtainMarks = $this->sectionClassStudentTermResultPublish->obtain_marks;
        }
    }

}
