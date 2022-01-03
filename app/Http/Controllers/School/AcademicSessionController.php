<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicSession;

class AcademicSessionController extends Controller
{
    public function index()
    {
        return view('school.session.index',['academicSessions'=>AcademicSession::simplePaginate(5)]);
    }

    public function configure($academicSessionId)
    {
        return view('school.session.configure',['academicSession'=>AcademicSession::find($academicSessionId)]);
    }

    public function saveAsCurrentSession($currentSessionId)
    {
        $session = AcademicSession::find($currentSessionId);

        foreach(AcademicSession::all() as $academicSession){
            $academicSession->update(['status'=>'Not Active']);
            foreach($academicSession->academicSessionTerms as $sessionTerm){
                $sessionTerm->update(['status'=>'Not Active']);
            }
        }

        $session->update(['status'=>'Active']);
        return redirect()->route('dashboard.session.index')->withSuccess($session->name.' Save as Current Academic Session');
    }

    public function update(Request $request)
    {
        $request->validate([
            "session_start_at" => "required",
            "session_end_at" => "required",
            "First_Term_start_at" => "required",
            "First_Term_end_at" => "required",
            "Second_Term_start_at" => "required",
            "Second_Term_end_at" => "required",
            "Third_Term_start_at" => "required",
            "Third_Term_end_at" => "required"
        ]);
        $academicSession = AcademicSession::find($request->academicSessionId);
        $academicSession->update([
            'start_at'=>$request->session_start_at,
            'end_at'=>$request->session_end_at
        ]);
        $canUpdate = true;
        foreach($academicSession->academicSessionTerms as $academicSessionTerm){
            switch ($academicSessionTerm->term->id) {
                case '1':
                $academicSessionTerm->update([
                    'start_at'=>$request->First_Term_start_at,
                    'end_at'=>$request->First_Term_end_at,
                    'status'=>'Not Active'
                    ]);
                    break;
                case '2':
                $academicSessionTerm->update([
                    'start_at'=>$request->Second_Term_start_at,
                    'end_at'=>$request->Second_Term_end_at,
                    'status'=>'Not Active'
                    ]);
                    break;
                default:
                $academicSessionTerm->update([
                    'start_at'=>$request->Third_Term_start_at,
                    'end_at'=>$request->Third_Term_end_at,
                    'status'=>'Not Active'
                    ]);
                    break;
            }
            
            if($canUpdate && strtotime($academicSessionTerm->end_at) > time()){
                $academicSessionTerm->update(['status'=>'Active']);
                $canUpdate = false;
            }
        }


        return redirect()->route('dashboard.session.configure',[$academicSession->id])->withSuccess($academicSession->name.' Configured Successfully');
    }
}
