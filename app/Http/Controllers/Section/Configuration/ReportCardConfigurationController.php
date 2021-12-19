<?php

namespace App\Http\Controllers\Section\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Psychomotor;
use App\Models\AffectiveTrait;

class ReportCardConfigurationController extends Controller
{
    public function index()
    {
        return view('section.configuration.reportcard',['psychomotors'=>Psychomotor::all(),'affectiveTraits'=>AffectiveTrait::all()]);
    }
}
