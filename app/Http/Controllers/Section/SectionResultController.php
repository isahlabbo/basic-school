<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionClass;

class SectionResultController extends Controller
{
    public function index($sectionId)
    {
        return view('section.result.index',['section'=>Section::find($sectionId)]);
    }

    public function classAwaitingResult($sectionClassId)
    {
        return view('section.result.awaiting',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }
}
