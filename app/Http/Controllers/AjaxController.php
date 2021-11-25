<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\SectionClass;

class AjaxController extends Controller
{
    public function getSectionClasses($sectionId)
    {
        return response()->json(SectionClass::where('section_id',$sectionId)->pluck('name','id'));
    }

    public function getWardPollingUnits($wardId)
    {
        return response()->json(PollingUnit::where(['ward_id'=>$wardId])->pluck('name','id'));
    }
}
