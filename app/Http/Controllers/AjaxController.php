<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\SectionClass;
use App\Models\SectionClassSubject;

class AjaxController extends Controller
{
    public function getSectionClasses($sectionId)
    {
        return response()->json(SectionClass::where('section_id',$sectionId)->pluck('name','id'));
    }

    public function getClassSubjects($sectionClassId)
    {
        return response()->json(SectionClassSubject::where(['section_class_id'=>$sectionClassId,'status'=>'Active'])->pluck('name','id'));
    }

    
    
}
