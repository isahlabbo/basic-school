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

    public function register(Request $request, $sectionId)
    {
        $request->validate([
            'class'=>'required|string',
            'code'=>'required|string',
            ]);
        $section = Section::find($sectionId);

        foreach($section->sectionClasses->where('name',$request->class) as $sectionClass){
            return redirect()->route('dashboard.section.index',$sectionId)->withWarning('Class has All ready exist');
        }
        $section->sectionClasses()->create(['name'=>strtoupper($request->class),'code'=>strtoupper($request->code),'year_sequence'=>$section->getYearSequence()]);
        return redirect()->route('dashboard.section.index',$sectionId)->withSuccess('Class Registered');
        
    }

    public function updateClass(Request $request, $sectionClassId)
    {
        $request->validate([
            'class'=>'required|string',
            'code'=>'required|string',
            ]);
        $class = SectionClass::find($sectionClassId);
        $class->update([
            'name'=>strtoupper($request->class),'code'=>strtoupper($request->code)]);
            return redirect()->route('dashboard.section.index',$class->section->id)->withSuccess('Class Updated');
    }

    public function deleteClass($sectionClassId)
    {
        $class = SectionClass::find($sectionClassId);
        if(count($class->sectionClassStudents)==0){
            $class->delete();
            return redirect()->route('dashboard.section.index',$class->section->id)->withSuccess('Class Deleted');            
        }else{
            return redirect()->route('dashboard.section.index',$class->section->id)->withSuccess('Sorry this class cant be deleted, it has some student inside');
        }
    }

    public function downloadTemplate($sectionClassId)
    {
        $sectionClass = SectionClass::find($sectionClassId);
        return Excel::download(new SectionClassStudentExport($sectionClass), strtolower(str_replace(' ','_',$sectionClass->name)).'_'.str_replace('/','_',$sectionClass->currentSession()->name).'_admitted_list.xlsx');
    }

    public function uploadTemplate(Request $request, $sectionClassId)
    {
        
        $request->validate([
            'template'=>'required',
        ]);
        $sectionClass = SectionClass::find($sectionClassId);
        Excel::import(new SectionClassStudentImport($sectionClass), request()->file('template'));

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

    public function reGenerateAdmissionNo($sectionClassId)
    {
        $sectionClass = SectionClass::find($sectionClassId);
        $sectionClass->updateAdmissionNo();
        return back()->withSuccess('All admission number regenerated');
    }
}
