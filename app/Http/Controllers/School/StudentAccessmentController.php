<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;
use App\Models\SectionClassStudent;
use App\Models\TeacherComment;

class StudentAccessmentController extends Controller
{
    public function index($sectionClassId)
    {
        return view('school.student.accessment.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }
    
    public function create($sectionClassStudentId)
    {
        return view('school.student.accessment.create',[
            'sectionClassStudent'=>SectionClassStudent::find($sectionClassStudentId),'comments'=>TeacherComment::all()
            ]);
    }
}
