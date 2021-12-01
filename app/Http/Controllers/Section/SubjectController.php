<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;

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
}
