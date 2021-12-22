<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Term;
use App\Models\Student;
use App\Models\StudentResult;
use App\Models\SectionClass;
use App\Models\SectionClassSubject;
use App\Models\SubjectTeacherTermlyUpload;

class ResultSearchController extends Controller
{
    public function index()
    {
        return view('section.class.subject.result.search.index',['sections'=>Section::all(),'terms'=>Term::all()]);
    }

    public function checkResult(Request $request)
    {
        if($request->admission_no){
            $student = Student::where('admission_no',$request->admission_no)->first();
            if($student){
                return redirect()->route('dashboard.section.class.student.result.view',[$student->id]);
            }else{
                return redirect()->route('dashboard.section.class.subject.result.index');
            }
        }elseif($request->subject){

            $sectionClassSubject = SectionClassSubject::find($request->subject);
            if(count($sectionClassSubject->availableResultUploads())>0){
                return redirect()->route('dashboard.section.class.subject.result.summary',[$sectionClassSubject->id])->withSuccess(count($sectionClassSubject->availableResultUploads()).' Result Summary Found');
            }else{
                return redirect()->route('dashboard.section.class.subject.result.index')->withWarning('No Result uploaded for '.$sectionClassSubject->sectionClass->name.' '.$sectionClassSubject->subject->name);
            }

        }elseif($request->class){
            $sectionClass = SectionClass::find($request->class);
            if($sectionClass->availableResultUploads()>0){
                return redirect()->route('dashboard.section.class.result.summary',[$sectionClass->id])->withSuccess($sectionClass->availableResultUploads().' Result Summary Found');
            }else{
                return redirect()->route('dashboard.section.class.subject.result.index')->withWarning('No Result uploaded for '.$sectionClass->name.' at '.$sectionClass->currentSession()->name);
            }
        }elseif($request->section){

        }else{
            return redirect()->route('dashboard.section.class.subject.result.index')->withWarning('PLs give us some thing to search for');
        }
    }

    public function viewResultSummary($sectionClassSubjectId)
    {
        return view('section.class.subject.result.search.summary',['sectionClassSubject'=>SectionClassSubject::find($sectionClassSubjectId)]);
    }

    public function viewDetail($subcetTeacherTermlyUploadId)
    {
        return view('section.class.subject.result.search.detail',['subjectTeacherTermlyUpload'=>SubjectTeacherTermlyUpload::find($subcetTeacherTermlyUploadId)]);
    }

    public function deleteUpload ($subjectTeacherTermlyUploadId)
    {
        $upload = SubjectTeacherTermlyUpload::find($subjectTeacherTermlyUploadId);
        
        foreach ($upload->studentResults as $studentResult) {
            $studentResult->delete();
        }
        $upload->delete();
          
        return redirect()->route('dashboard.section.class.result.summary',[$upload->sectionClassSubjectTeacher->sectionClassSubject->sectionClass->id])->withSuccess(' Result Deleted');
    }

    public function editResult($studentResultId)
    {
        return view('section.class.subject.result.search.edit',['studentResult'=>StudentResult::find($studentResultId)]);
    }
    

    public function updateResult(Request $request)
    {
        $request->validate([
            'first_ca'=>'required',
            'second_ca'=>'required',
            'exam'=>'required'
            ]);
        $studentResult = StudentResult::find($request->studentResultId);
        $studentResult->update([
            'first_ca'=>$request->first_ca,
            'second_ca'=>$request->second_ca,
            'exam'=>$request->exam
        ]);

        $studentResult->updateTotalAndComputeGrade();

        return redirect()->route('dashboard.section.class.subject.result.summary.detail.edit',[$request->studentResultId])->withSuccess('Result Updated');

    }
}
