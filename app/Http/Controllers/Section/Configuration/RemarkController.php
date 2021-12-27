<?php

namespace App\Http\Controllers\Section\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RemarkScale;

class RemarkController extends Controller
{
    public function update(Request $request, $remarkScaleId)
    {
        $request->validate(['scale'=>"required",'remark'=>"required"]);
        $remark = RemarkScale::find($remarkScaleId);
        $remark->update([
            'grade'=>$request->grade,
            'scale'=>$request->scale,
            'percent'=>$request->percent,
            'remark'=>$request->remark,
            ]);
        return redirect()->route('dashboard.section.configuration.reportcard.index')->withSuccess('Remark Updated');
    }
}
