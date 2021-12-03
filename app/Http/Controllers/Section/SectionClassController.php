<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionClass;
use App\Models\Student;
use App\Models\Section;
use App\Exports\SectionClassStudentExport;
use App\Imports\SectionClassStudentImport;
use Excel;

class SectionClassController extends Controller
{
    public function index($sectionClassId)
    {
        return view('section.class.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function downloadTemplate($sectionClassId)
    {
        $sectionClass = SectionClass::find($sectionClassId);
        return Excel::download(new SectionClassStudentExport(), strtolower(str_replace(' ','_',$sectionClass->name)).'_'.str_replace('/','_',$sectionClass->currentSession()->name).'_admitted_list.xlsx');
    }

    public function uploadTemplate(Request $request, $sectionClassId)
    {
        
        $request->validate([
            'template'=>'required',
        ]);
        Excel::import(new SectionClassStudentImport(SectionClass::find($sectionClassId)), request()->file('template'));
        
        return redirect()->route('dashboard.section.class.student',[$sectionClassId])->withSuccess('All Students Uploaded');
    }


    public function student($sectionClassId)
    {
        return view('section.class.student.index',['sectionClass'=>SectionClass::find($sectionClassId)]);
    }

    public function edit($studentId)
    {
        return view('section.class.student.edit',['sections'=>Section::all(),'student'=>Student::find($studentId)]);
    }

    public function delete($studentId)
    {
        $student = Student::find($studentId);
        foreach($student->sectionClassStudents as $sectionClassStudent){
            $sectionClassStudent->delete();
        }

        $student->delete();

        return back()->withSuccess('Student Deleted Successfully');
    }

    public function update(Request $request, $studentId)
    {
        $student = Student::find($studentId);
        $student->guardian->update([
            'name'=>strtoupper($request->guardian_name),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address
        ]);

        if($request->class != $student->sectionClass->id){
            foreach($student->secionClassStudents as $sectionClassStudent){
                $sectionClassStudent->delete();
            }
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
        }

        $student->update([
            'name'=>strtoupper($request->name),
            'date_of_birth'=>$request->date_of_birth,
            'section_class_id'=>$request->class,
            'gender'=>$request->gender
        ]);
        if($request->class != $student->sectionClass->id){
            $student->update(['admission_no'=>$student->sectionClass->generateAdmissionNo()]);
        }
        return redirect()->route('dashboard.section.class.student',[$student->sectionClass->id])
        ->withSuccess('Updated');
        
    }
}
