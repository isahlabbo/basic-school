<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Term;
use App\Models\StudentResult;
use App\Models\SectionClassSubject;
use App\Models\SubjectTeacherTermlyUpload;

class SubjectResultController extends Controller
{
    public function index()
    {
        return view('section.class.subject.result.index',['sections'=>Section::all(),'terms'=>Term::all()]);
    }

    public function checkResult(Request $request)
    {
        if($request->admission_no){
            dd($request->admission_no);
        }elseif($request->subject){

            $sectionClassSubject = SectionClassSubject::find($request->subject);
            if(count($sectionClassSubject->availableResultUploads())>0){
                return redirect()->route('dashboard.section.class.subject.result.summary',[$sectionClassSubject->id])->withSuccess(count($sectionClassSubject->availableResultUploads()).' Result Summary Found');
            }else{
                return redirect()->route('dashboard.section.class.subject.result.index')->withWarning('No Result uploaded for '.$sectionClassSubject->sectionClass->name.' '.$sectionClassSubject->subject->name);
            }

        }elseif($request->class){

        }elseif($request->section){

        }else{
            return redirect()->route('dashboard.section.class.subject.result.index')->withWarning('PLs give us some thing to search for');
        }
    }

    public function viewResultSummary($sectionClassSubjectId)
    {
        return view('section.class.subject.result.summary',['sectionClassSubject'=>SectionClassSubject::find($sectionClassSubjectId)]);
    }

    public function viewDetail($subcetTeacherTermlyUploadId)
    {
        return view('section.class.subject.result.detail',['subjectTeacherTermlyUpload'=>SubjectTeacherTermlyUpload::find($subcetTeacherTermlyUploadId)]);
    }

    public function editResult($studentResultId)
    {
        return view('section.class.subject.result.edit',['studentResult'=>StudentResult::find($studentResultId)]);
    }
    

    public function updateResult(Request $request)
    {
        $request->validate(['ca'=>'required','exam'=>'required']);
        $studentResult = StudentResult::find($request->studentResultId);
        $studentResult->update([
            'ca'=>$request->ca,
            'exam'=>$request->exam,
            'total'=>$request->exam+$request->ca
        ]);

        $studentResult->reComputeGrade();

        return redirect()->route('dashboard.section.class.subject.result.summary.detail.edit',[$request->studentResultId])->withSuccess('Result Updated');

    }

}
