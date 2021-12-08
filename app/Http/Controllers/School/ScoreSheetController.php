<?php

namespace App\Http\Controllers\School;
use Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClassSubjectTeacher;
use App\Exports\Student\ScoreSheet;
use App\Models\SectionClassSubject;
use App\Models\Term;
use App\Imports\School\ScoreSheet as ScoreSheetImport;
use Auth;

class ScoreSheetController extends Controller
{
    public function download($sectionClassSubjectTeacherId)
    {
        $sectionClassSubjectTeacher = SectionClassSubjectTeacher::find($sectionClassSubjectTeacherId);
        $sectionClassSubjectTeacher->sectionClassSubject->sectionClassSubjectDownloads()->create(['academic_session_term_id'=>$sectionClassSubjectTeacher->currentSessionTerm()->id]);
        return Excel::download(new ScoreSheet($sectionClassSubjectTeacher
        ->sectionClassSubject
        ->sectionClass
        ->currentStudents()), $sectionClassSubjectTeacher->getDownloadableName().'_score_sheet.xlsx');
    }
    
    public function upload($sectionClassSubjectId)
    {
        return view('school.teacher.scoreSheet.upload',['terms'=>Term::all(),'sectionClassSubject'=>SectionClassSubject::find($sectionClassSubjectId)]);
    }
    public function uploadNow(Request $request, $sectionClassSubjectId)
    {
        $request->validate([
            'term'=>'required',
            'score_sheet'=>'required',
        ]);
        $sectionClassSubject = SectionClassSubject::find($request->sectionClassSubjectId);
<<<<<<< HEAD

=======
        $sectionClassSubject->sectionClassSubjectUploads()->create(['academic_session_term_id'=>$sectionClassSubject->currentSessionTerm()->id]);
>>>>>>> effb797dd2c4667d7dec899ed0d8164733225652
        Excel::import(new ScoreSheetImport($sectionClassSubject, Term::find($request->term)), request()->file('score_sheet'));
        
        if(Auth::user()->role =='Teacher'){
            return redirect()->route('dashboard')->withSuccess('Result Uploaded Success fully');
        }
        return redirect()->route('dashboard.section.class.subject.result',[$sectionClassSubject->sectionClass->id])->withSuccess('Result Uploaded Success fully');
    }


}
