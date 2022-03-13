<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function register(Request $request, $sectionClassId)
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
        if($request->question_type_id == 1){
            $question->options()->firstOrCreate([
                'name'=>'A',
                'value'=>$request->A,
                ]);
            $question->options()->firstOrCreate([
                'name'=>'B',
                'value'=>$request->B,
                ]);
            $question->options()->firstOrCreate([
                'name'=>'C',
                'value'=>$request->C,
                ]);
            $question->options()->firstOrCreate([
                'name'=>'D',
                'value'=>$request->D,
                ]);    
        }
        return redirect()->route('dashboard.section.class.exam.subject',[$sectionClassId])->withSuccess('Question added successfully');    
    }
    public function examSubject($examId)
    {
        return view('section.class.exam.subject',['exam'=>SectionClassTermlyExam::find($examId)]);
    }
    public function subjectQuestionPaper($examId, $subjectId)
    {
        return view('section.class.exam.subjectQuestion',[
            'exam'=>SectionClassTermlyExam::find($examId),
            'sectionClassSubject'=>SectionClassSubject::find($subjectId)
            ]);
    }
}
