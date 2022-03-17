<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\SectionClass;
use App\Models\SectionClassSubject;
use App\Models\ExamSubjectQuestionSection;
use App\Models\SectionClassTermlyExam;
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

    public function register(Request $request, $sectionClassId)
    {
        $request->validate([
            'question_type_id'=>'required',
            'question_section_id'=>'required',
            'question'=>'required',
            ]);
        $exam = ExamSubjectQuestionSection::find($request->question_section_id);
        $question = $exam->questions()->firstOrCreate([
            'exam_subject_question_section_id'=>$request->question_section_id,
            'question_type_id'=>$request->question_type_id,
            'question'=>$request->question,
            'answer'=>$request->answer,
            ]);
        if($request->diagram){
            $this->storeFile($question,'diagram',$request->diagram,
            $exam->sectionClass->section->name.'/'
            .$exam->sectionClass->name.'/'
            .str_replace('/','-',$exam->currentSession()->name)
            ."/Question/");
        }
        
        return redirect()->route('dashboard.section.class.exam.subject.question.index',[$sectionClassId, $request->section_class_subject_id])->withSuccess('Question added successfully');    
    }

    public function update(Request $request, $sectionClassId, $questionId)
    {
        
        $request->validate([
            'question_type_id'=>'required',
            'question'=>'required',
            'question_section_id'=>'required',
            ]);
        $question = Question::find($questionId);
        $question->update([
            'question_type_id'=>$request->question_type_id,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'exam_subject_question_section_id'=>$request->question_section_id,
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

    public function move(Request $request)
    {
        $request->validate(['to_subject_id'=>'required']);
        $exam = SectionClassTermlyExam::find($request->exam_id);
        foreach($exam->examSubjectQuestionSections->where('section_class_subject_id',$request->from_subject_id) as $examSubject){
            $examSubject->update(['section_class_subject_id'=>$request->to_subject_id]);
        }

        return redirect()->route('dashboard.section.class.exam.subject',
        [$exam->sectionClass, $exam->id])->withSuccess('All Question Was Moved Successfully');
    }
}
