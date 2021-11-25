<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\SectionClassSubject;
use App\Models\SectionClassSubjectTeacher;

class SubjectTeacherAllocationController extends Controller
{
    public function create($sectionClassSubjectId)
    {
        return view('section.class.subject.allocation.create',['teachers'=>Teacher::all(), 'sectionClassSubject'=>SectionClassSubject::find($sectionClassSubjectId)]);
    }
    public function reCreate($sectionClassSubjectId)
    {
        return view('section.class.subject.allocation.reCreate',['teachers'=>Teacher::all(), 'sectionClassSubjectTeacher'=>SectionClassSubjectTeacher::find($sectionClassSubjectId)]);
    }

    public function register(Request $request, $sectionClassSubjectId)
    {
        $teacher = Teacher::find($request->teacher);

        $sectionClassSubject = SectionClassSubject::find($sectionClassSubjectId);

        if(isset($request->change)){
            foreach($sectionClassSubject->sectionClassSubjectTeachers as $sectionClassSubjectTeacher){
                $sectionClassSubjectTeacher->update(['status'=>'Not Active']);
            }
            $message = 'The allocation changed was successfully';
        }else{
            $message = 'The allocation registered was successfully';
        }

        $teacher->sectionClassSubjectTeachers()->create([
            'section_class_subject_id'=>$request->sectionClassSubjectId
        ]);

        return redirect()->route('dashboard.section.class.subject.index',[$sectionClassSubject->sectionClass->id])
        ->withSuccess($message);

    }
}
