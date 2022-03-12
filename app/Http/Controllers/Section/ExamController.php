<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;

class ExamController extends Controller
{
    public function index($sectionClassId)
    {
        return view('section.class.exam.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }
}
