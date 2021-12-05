<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;
use Excel;
use App\Exports\StudentAccessmentExport;
use App\Imports\StudentAccessmentImport;

class ClassResultController extends Controller
{
    public function summary($sectionClassId)
    {
        return view('section.class.result.summary',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function report($sectionClassId)
    {
        return view('section.class.result.report',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }
    
    public function downloadAccessment($sectionClassId)
    {
        $sectionClass = SectionClass::find($sectionClassId);

        return Excel::download(new StudentAccessmentExport($sectionClass), 
        strtolower(str_replace(' ','_',$sectionClass->name)).'_'.str_replace('/','_',$sectionClass->currentSession()->name).
        '_student_accessment.xlsx');
    }

    public function uploadAccessment(request $request, $sectionClassId)
    {
        $request->validate([
            'accessment'=>'required',
        ]);
        
        Excel::import(new StudentAccessmentImport(SectionClass::find($sectionClassId)), request()->file('accessment'));
        
        return redirect()->route('dashboard.section.class.result.summary',[$sectionClassId])->withSuccess('Student Accessment Uploaded Successfully');
    }

}
