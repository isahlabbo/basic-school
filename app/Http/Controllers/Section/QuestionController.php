<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\SectionClass;
use App\Models\SectionClassSubject;
use App\Services\Upload\FileUpload;

class QuestionController extends Controller
{
    use FileUpload;

    public function index($sectionClassId, $sectionClassSubjectId)
    {
        return view('section.class.exam.subject.question.index',[
            'sectionClass'=>SectionClass::find($sectionClassId),
            'sectionClassSubject'=>SectionClassSubject::find($sectionClassSubjectId),
            ]);
    }

    public function view($sectionClassId, $questionId)
    {
        return view('section.class.exam.subject.question.view',[
            'sectionClass'=>SectionClass::find($sectionClassId),
            'question'=>Question::find($questionId),
            ]);
    }

    public function update(Request $request, $sectionClassId, $questionId)
    {
        
        $request->validate([
            'question_type_id'=>'required',
            'question'=>'required',
            ]);
        $question = Question::find($questionId);
        $question->update([
            'question_type_id'=>$request->question_type_id,
            'question'=>$request->question,
            ]);
        if($request->diagram){
            $this->updateFile($question,'diagram',$request->diagram,
            $exam->sectionClass->section->name.'/'
            .$exam->sectionClass->name.'/'
            .str_replace('/','-',$exam->currentSession()->name)
            ."/Question/");
        }
        
        return redirect()->route('dashboard.section.class.exam.subject.question.view',
        [$sectionClassId, $question->id])->withSuccess('Question updated');    
    }

    public function delete(Request $request, $sectionClassId, $questionId)
    {
        $question = Question::find($questionId);
        $subject = $question->sectionClassSubject;
        foreach ($question->options as $option) {
            $option->delete();
        }
        foreach ($question->questionItems as $questionItem) {
            $questionItem->delete();
        }
        $question->delete();
        return redirect()->route('dashboard.section.class.exam.subject.question.index',
        [$sectionClassId, $subject->id])->withSuccess('Question Deleted');    
    }
}
