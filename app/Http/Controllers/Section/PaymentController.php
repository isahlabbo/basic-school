<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Section;
use App\Models\SectionClass;
class PaymentController extends Controller
{
    public function index()
    {
        return view('section.payment.search',['sections'=>Section::all()]);
    }

    public function search(Request $request)
    {
        $request->validate(['section'=>'required']);
        if($request->class){
            // search specific class students payment
            return redirect()->route('dashboard.payment.class.index',[$request->class]);
        }else{
            // search all section student payments
        }
    }

    public function classStudentPayment ($sectionClassId)
    {
        return view('section.payment.class.index',['sectionClass'=>SectionClass::find($sectionClassId),'terms'=>Term::all()]);
    }
}
