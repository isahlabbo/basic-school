<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;

class SectionClassController extends Controller
{
    public function index($sectionClassId)
    {
        return view('section.class.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }
}
