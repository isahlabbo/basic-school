<?php

namespace App\Http\Controllers\Section\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\GradeScale;
use App\Models\RemarkScale;
use App\Models\Psychomotor;
use App\Models\AffectiveTrait;

class ReportCardConfigurationController extends Controller
{
    public function index()
    {
        return view('section.configuration.reportcard',[
            'sections'=>Section::all(),
            'gradeScales'=>GradeScale::all(),
            'remarkScales'=>RemarkScale::all(),
            'psychomotors'=>Psychomotor::all(),
            'affectiveTraits'=>AffectiveTrait::all()
            ]);
    }

}
