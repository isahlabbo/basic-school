

<div class="col-md-4 text">
    <table style="width: 100%">
    <tr style="color: black;">
        <td class="mb-0" style="width: 150px;">Admission No:</td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudent->student->admission_no ?? ''}}</b></td>
    </tr>
    
    <tr style="color: black;">
        <td class="mb-0">Student Name:</td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudent->student->name ?? ''}}</b></td>
    </tr>
    
    <tr style="color: black;">
        
        <td class="mb-0">Sex:</td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudent->student->gender->name ?? ''}}</b></td>
    </tr>
    
    <tr style="color: black;">
        
        <td class="mb-0">No in class:</td>
        <td class="mb-0 text-right"><b>{{count($sectionClassStudent->sectionClass->sectionClassStudents->where('status','Active')) ?? ''}}</b></td>
    </tr>
    
    <tr style="color: black;">
        
        <td class="mb-0">
        @if(config('app.nursery_class_position') == true && $sectionClassStudent->sectionClass->section->name == 'NURSERY')
            Remark:
        @else
            Position:
        @endif
        </td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudent->sectionClass->studentPosition($sectionClassStudentTerm) ?? 0}}</b></td>
    </tr>
    
    <tr style="color: black;">
        
        <td class="mb-0">Class Average:</td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudent->sectionClass->classAverage($sectionClassStudentTerm->academicSessionTerm->term)}}</b></td>
    </tr>
    
    <tr style="color: black;">
        
        <td class="mb-0">Pupils Average:</td>
        <td class="mb-0 text-right"><b>{{$sectionClassStudentTerm->studentAverage()}}</b></td>
    </tr>

    <tr style="color: black;">
        
        <td class="mb-0">No of subjects:</td>
        <td class="mb-0 text-right"><b>{{count($sectionClassStudent->sectionClass->sectionClassSubjects)}}</b></td>
    </tr>
    
    @if(config('app.fee'))
    <tr style="color: black;">
        <td><p class="mb-0">Next Term Fee:</p></td>
        <td><p class="mb-0 text-right"><b>#15,000.00</b></p></td>
    </tr>
    @endif        
    </table>
</div>

<div class="col-md-4" style="color: black;">
    <p class="mb-0">
    <tr><td>Next Term Begins:</td> <td class="text text-left"><b>{{strtoupper(date('d-M-Y',strtotime($sectionClassStudent->nextSectionClassStudentTerm()->start_at))) ?? 'Not available'}}</b></td></tr></p>
    <p class="mb-0">Term: <b>{{strtoupper($sectionClassStudentTerm->academicSessionTerm->term->name ?? '')}}</b></p>
    <p class="mb-0">Class: <b>{{$sectionClassStudent->sectionClass->name ?? ''}}</b></p>
    <p class="mb-0">Session: <b>{{$sectionClassStudentTerm->academicSessionTerm->academicSession->name ?? ''}}</b></p>
    <p class="mb-0"><b>ATTENDANCE:</b></p>
    <p class="mb-0">
        <tr>
            <td>Days school open:</td>
            <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_school_open ?? 0}}</b></td>
        </tr>
    </p>
    <p class="mb-0">
    <tr>
        <td>Day(s) Present:</td>
        <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_present ?? 0}}</b></td>
    </tr>
    
    </p>
    <p class="mb-0">
        <tr>
            <td>Day(s) Absent:</td>
            <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_absent ?? 0}}</b></td>
        </tr>
    </p>
</div>
<div class="col-md-2 text-center">
    @if($student->picture)
    <img src="{{$student->profileImage()}}" alt="" height="200" width="170p" class="rounded">
    @else
    <img src="{{asset('assets/images/user.jpg')}}" width="200" height="170p" class="rounded" alt="">
    @endif
</div>
