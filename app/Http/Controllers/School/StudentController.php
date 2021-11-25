<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\Guardian;

class StudentController extends Controller
{
    public function index()
    {
       return view('school.student.index',['students'=>Student::all()]);
    }

    public function create()
    {
       return view('school.student.create',['sections'=>Section::all()]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required'],
        ]);
        
        $guardian = Guardian::create([
            'name'=>$request->guardian_name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email
        ]);

        $student = $guardian->students()->create([
            'name'=>$request->name,
            'date_of_birth'=>$request->date_of_birth,
            'section_class_id'=>$request->class
        ]);

        $student->sectionClassStudents()->create(['section_class_id'=>$request->class]);

        return redirect()->route('dashboard.student.index')->withSuccess('Student Registered Successfully');
    }
}
