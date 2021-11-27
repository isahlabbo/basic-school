<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Term;

class StudentResultController extends Controller
{
    public function view($studentId)
    {
        return view('section.class.student.result.view',['terms'=>Term::all(),'student'=>Student::find($studentId)]);
    }
}
