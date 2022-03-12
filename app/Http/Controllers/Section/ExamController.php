<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;
use App\Models\SectionClassTermlyExam;

class ExamController extends Controller
{
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
    public function examSubject($examId)
    {
        return view('section.class.exam.subject',['exam'=>SectionClassTermlyExam::find($examId)]);
    }
}
