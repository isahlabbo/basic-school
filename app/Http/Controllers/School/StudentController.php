<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\SectionClass;
use App\Models\Guardian;
use App\Models\AcademicSessionTerm;
use App\Services\Upload\FileUpload;
class StudentController extends Controller
{
    use FileUpload;

    public function index()
    {
       return view('school.student.index',['sections'=>Section::all()]);
    }
    
    public function profile($studentId)
    {
       return view('school.student.profile',['student'=>Student::find($studentId)]);
    }

    public function search(Request $request)
    {
        if($request->admission_no){
            $student = Student::where('admission_no',$request->admission_no)->first();
            if($student){
                return redirect()->route('dashboard.student.profile',[$student->id]);
            }
            return redirect()->route('dashboard.student.index')->withWarning('Invalid Admission No');
        }elseif ($request->class) {
            return redirect()->route('dashboard.section.class.student',[$request->class]);
        }else{
            return redirect()->route('dashboard.student.index')->withWarning('Pls specify what seach for');
        }
    }

    public function create()
    {
       return view('school.student.create',['sections'=>Section::all()]);
    }

    public function edit($studentId)
    {
       return view('school.student.edit',['student'=>Student::find($studentId),'sections'=>Section::all()]);
    }


    public function resume($academicSessionTermId)
    {
        return view('school.student.resume',['academicSessionTerm'=>AcademicSessionTerm::find($academicSessionTermId)]);
    }

    public function confirmResume ($academicSessionTermId)
    {
        foreach(Section::cursor() as $section){
            foreach($section->sectionClasses as $sectionClass){
                $sectionClass->updateAllStudentTerm();
            }
        }
        
        $academicSessionTerm = AcademicSessionTerm::find($academicSessionTermId);
        $academicSessionTerm->academicSession->updateNextTerm($academicSessionTerm->term);
        return redirect()->route('dashboard')->withSuccess('All Students Info has been updated to the next term');
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
            'academic_session_id'=>$sectionClass->classAdmissionSession()->id,
            'gender_id'=>$request->gender
        ]);
        if($request->picture){
            $this->storeFile($student,'picture',$request->picture,
            $sectionClass->section->name.'/'
            .$sectionClass->name.'/'
            .str_replace('/','-',$sectionClass->currentSession()->name)
            ."/Admission/");
        }

        $classStudent = $student->sectionClassStudents()->create(['section_class_id'=>$sectionClass->id]);
        
        
        foreach($student->currentSession()->academicSessionTerms as $academicSessionTerm){
            if($academicSessionTerm->status == 'Active'){
                $academicSessionTerm->sectionClassStudentTerms()->create(['status'=>'Active','section_class_student_id'=>$classStudent->id]);
            }else{
                $academicSessionTerm->sectionClassStudentTerms()->create(['section_class_student_id'=>$classStudent->id]);
            }
        }

        return redirect()->route('dashboard.student.index')->withSuccess('Student Registered Successfully');
    }
}
