<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;
use Excel;
use App\Exports\StudentAccessmentExport;
use App\Import\StudentAccessmentImport;

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
    
    public function download($sectionClassId)
    {
        $sectionClass = SectionClass::find($sectionClassId);

        return Excel::download(new StudentAccessmentExport($sectionClass), 
        strtolower(str_replace(' ','_',$sectionClass->name)).'_'.str_replace('/','_',$sectionClass->currentSession()->name).
        '_student_accessment.xlsx');
    }

}
