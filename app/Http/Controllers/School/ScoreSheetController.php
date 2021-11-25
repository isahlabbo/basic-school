<?php

namespace App\Http\Controllers\School;
use Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClassSubjectTeacher;
use App\Exports\Student\ScoreSheet;

class ScoreSheetController extends Controller
{
    public function download($sectionClassSubjectTeacherId)
    {
        $sectionClassSubjectTeacher = SectionClassSubjectTeacher::find($sectionClassSubjectTeacherId);
        return Excel::download(new ScoreSheet($sectionClassSubjectTeacher
        ->sectionClassSubject
        ->sectionClass
        ->currentStudents()), $sectionClassSubjectTeacher->getDownloadableName().'_score_sheet.xlsx');
    }
}
