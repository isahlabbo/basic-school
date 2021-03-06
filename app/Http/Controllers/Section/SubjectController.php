<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SectionClass;
use App\Models\SectionClassSubject;

class SubjectController extends Controller
{
    public function index($sectionClassId)
    {
        return view('section.class.subject.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function result($sectionClassId)
    {
        return view('section.class.subject.result.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function register(Request $request, $sectionClassId)
    {
        $request->validate(['name'=>'required|string']);

        $sectionClass = SectionClass::find($sectionClassId);
        if(count($sectionClass->sectionClassSubjects->where('name',$request->name)) > 0){
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withwarning('Class Subject already exist');
        }else{
            $subject = Subject::firstOrCreate(['name'=>strtoupper($request->name)]);
            $sectionClass->sectionClassSubjects()->create(['name'=>strtoupper($request->name),'subject_id'=>$subject->id]);
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withSuccess('Class Subject Registered');
        }
    }

    public function update(Request $request, $sectionClassId, $sectionClassSubjectId)
    {
        $sectionClass = SectionClass::find($sectionClassId);
        if(count($sectionClass->sectionClassSubjects->where('name',$request->name)) > 0){
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withwarning('Class Subject already exist');
        }else{
            $subject = Subject::firstOrCreate(['name'=>strtoupper($request->name)]);
            $sectionClassSubject = SectionClassSubject::find($sectionClassSubjectId);
            $sectionClassSubject->update(['name'=>strtoupper($request->name),'subject_id'=>$subject->id]);
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withSuccess('Class Subject Updated');
        }
    }

    public function delete($sectionClassId, $sectionClassSubjectId)
    {
        $sectionClassSubject = SectionClassSubject::find($sectionClassSubjectId);
        if(count($sectionClassSubject->availableResultUploads())>0){
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withwarning('Sorry we cant delete this subject there are result uploade on it');
        }else{
            $sectionClassSubject->delete();
            return redirect()->route('dashboard.section.class.subject.index',[$sectionClassId])
            ->withSuccess('Class Subject Deleted');
        }
    }
}
