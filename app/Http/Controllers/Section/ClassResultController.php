<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;

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


}
