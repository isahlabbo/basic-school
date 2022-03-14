<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionItem;
use App\Models\Option;
use App\Models\SectionClass;
use App\Models\SectionClassTermlyExam;
use App\Models\SectionClassSubject;
use App\Services\Upload\FileUpload;

class ExamController extends Controller
{
    use FileUpload;

    public function index($sectionClassId)
    {
        return view('section.class.exam.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function register(Request $request, $sectionClassIdad)
    {
        $request->validate([
            'session'=>'required',
            'term'=>'required',
            ]);
        $sectionClass = SectionClass::find($sectionClassId);
        $exam = $sectionClass->sectionClassTermlyExams()->firstOrCreate([
            'academic_session_term_id'=>$request->term,
            'academic_session_id'=>$request->session,
            ]);
            if($sectionClass->currentSessionTerm()->id == $request->term){
                $exam->update(['status'=>'Active']);
            }
            return redirect()->route('dashboard.section.class.exam.index',[$sectionClassId]);    
    }

    public function addQuestion(Request $request, $sectionClassId)
    {
        
        $request->validate([
            'question_type_id'=>'required',
            'question'=>'required',
            ]);
        $exam = SectionClassTermlyExam::find($request->section_class_termly_exam_id);
        $question = $exam->questions()->firstOrCreate([
            'section_class_subject_id'=>$request->section_class_subject_id,
            'question_type_id'=>$request->question_type_id,
            'question'=>$request->question,
            ]);
        if($request->diagram){
            $this->storeFile($question,'diagram',$request->diagram,
            $exam->sectionClass->section->name.'/'
            .$exam->sectionClass->name.'/'
            .str_replace('/','-',$exam->currentSession()->name)
            ."/Question/");
        }
        
        return redirect()->route('dashboard.section.class.exam.subject',[$sectionClassId,$exam->id])->withSuccess('Question added successfully');    
    }
    public function examSubject($examId)
    {
        return view('section.class.exam.subject',['exam'=>SectionClassTermlyExam::find($examId)]);
    }

    public function subjectQuestion($examId, $subjectId)
    {
        return view('section.class.exam.question',[
            'sectionClassTermlyExam'=>SectionClassTermlyExam::find($examId),
            'sectionClassSubject'=>SectionClassSubject::find($subjectId)
        ]);
    }
    public function subjectQuestionPaper($examId, $subjectId)
    {
        return view('section.class.exam.subjectQuestion',[
            'exam'=>SectionClassTermlyExam::find($examId),
            'sectionClassSubject'=>SectionClassSubject::find($subjectId)
            ]);
    }

    public function newItem (Request $request, $exam, $question)
    {
       $question = Question::find($request->questionId);
       $question->questionItems()->firstOrCreate(['name'=>$request->item]);
       return redirect()->route('dashboard.section.class.exam.subject.question.view',
       [$question->sectionClassSubject->sectionClass->id,$question->id]
    )->withSuccess('Question Item Added');
    }

    public function newOption (Request $request, $exam, $question)
    {
       $question = Question::find($request->questionId);
       $question->options()->firstOrCreate([
           'name'=>$request->name,
           'value'=>$request->value
           ]);
       return redirect()->route('dashboard.section.class.exam.subject.question.view',
       [$question->sectionClassSubject->sectionClass->id,$question->id]
    )->withSuccess('Question Option Added');
    }

    public function deleteOption ($classId, $optionId)
    {
        $option = Option::find($optionId);
        $question = $option->question;
        $option->delete();
        return redirect()->route('dashboard.section.class.exam.subject.question',
        [$question->sectionClassSubject->sectionClass->id,$question->sectionClassSubject->id]
        )->withSuccess('Question Option deleted');
    }

    public function deleteItem ($classId, $itemId)
    {
        $item = QuestionItem::find($itemId);
        $question = $item->question;
        $item->delete();
        return redirect()->route('dashboard.section.class.exam.subject.question',
        [$question->sectionClassSubject->sectionClass->id,$question->sectionClassSubject->id]
        )->withSuccess('Question item deleted');
    }
}
