<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\SectionClass;
use App\Models\SectionClassPayment;

class ClassFeeController extends Controller
{
    public function index($sectionClassId)
    {
        return view('section.payment.class.fee.index',['sectionClass'=>SectionClass::find($sectionClassId),'terms'=>Term::all()]);
    }

    public function register(Request $request, $sectionClassId)
    {
        $request->validate([
            "name" => "required|string",
            "amount" => "required|integer",
            "gender" => "required",
            "term" => "required"
        ]);
        
        $sectionClass = SectionClass::find($sectionClassId);

        $sectionClass->sectionClassPayments()->firstOrCreate([
            "name" => $request->name,
            "amount" => $request->amount,
            "gender_id" => $request->gender,
            "term_id" => $request->term
        ]);

        return redirect()->route('dashboard.payment.class.fee.index',[$sectionClassId])->withSuccess('Fee Item Added');    
    }

    public function update(Request $request, $sectionClassId,$feeId)
    {
        $request->validate([
            "name" => "required|string",
            "amount" => "required|integer",
            "gender" => "required",
            "term" => "required"
        ]);
        
        $fee = SectionClassPayment::find($feeId);

        $fee->update([
            "name" => $request->name,
            "amount" => $request->amount,
            "gender_id" => $request->gender,
            "term_id" => $request->term
        ]);

        return redirect()->route('dashboard.payment.class.fee.index',[$sectionClassId])->withSuccess('Fee Item Updated');    
    }

    public function delete($sectionClassId,$feeId)
    {
        $fee = SectionClassPayment::find($feeId);
        $fee->delete();
        return redirect()->route('dashboard.payment.class.fee.index',[$sectionClassId])->withSuccess('Fee Item Deleted');
    }
}
