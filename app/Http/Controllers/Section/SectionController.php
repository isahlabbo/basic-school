<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index($sectionId)
    {
        
        return view('section.index', ['section'=>Section::find($sectionId)]);
    }
}
