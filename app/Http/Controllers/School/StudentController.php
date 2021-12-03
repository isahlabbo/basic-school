<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\SectionClass;
use App\Models\Guardian;

class StudentController extends Controller
{
    public function index()
    {
       return view('school.student.index',['students'=>Student::paginate(5)]);
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
            'date_of_birth' => ['required'],
        ]);
        $sectionClass = SectionClass::find($request->class);
        
        $guardian = Guardian::create([
            'name'=>strtoupper($request->guardian_name),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address
        ]);

        $student = $guardian->students()->create([
            'name'=>strtoupper($request->name),
            'date_of_birth'=>$request->date_of_birth,
            'admission_no'=>$sectionClass->generateAdmissionNo(),
            'section_class_id'=>$request->class,
            'academic_session_id'=>$guardian->currentSession()->id,
            'gender'=>$request->gender
        ]);

        $classStudent = $student->sectionClassStudents()->create(['section_class_id'=>$sectionClass->id]);
        
        $count = 1;
        foreach($student->currentSession()->academicSessionTerms as $academicSessionTerm){
            if($count == 1){
                $academicSessionTerm->sectionClassStudentTerms()->create(['status'=>'Active','section_class_student_id'=>$classStudent->id]);
            }else{
                $academicSessionTerm->sectionClassStudentTerms()->create(['section_class_student_id'=>$classStudent->id]);
            }
            $count++;
        }

        return redirect()->route('dashboard.student.index')->withSuccess('Student Registered Successfully');
    }
}
