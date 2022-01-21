
<table style="width: 100%;" class=" table-bordered table- table-striped table-hover">
    <thead class="text text-center table-dark">
        <tr>
            <th>SUBJECT</th>
            <th>1ST CA</th>
            <th>2ND CA</th>
            <th>EXAM</th>
            <th>TOTAL</th>
            <th>GRADE</th>
            <th>POSIOTION</th>
            <th>EFFORT</th>
            <th>REMARK</th>
        </tr>
    </thead>
    <tbody class="m-0">
    @php
        $subjects = 0;
        $obtainedMarks = 0;
    @endphp
    @foreach($sectionClassStudentTerm->studentResults as $studentResult)
        @php
            $subjects++;
            $obtainedMarks = $obtainedMarks + $studentResult->total;
        @endphp
        <tr >
            <td>{{$studentResult->subjectTeacherTermlyUpload->sectionClassSubjectTeacher->sectionClassSubject->name}}</td>
            <td class="text text-center">{{$studentResult->first_ca}}</td>
            <td class="text text-center">{{$studentResult->second_ca}}</td>
            <td class="text text-center">{{$studentResult->exam}}</td>
            <td class="text text-center">{{$studentResult->total}}</td>
            <td class="text text-center">{{$studentResult->grade}}</td>
            <td class="text text-center">{{$studentResult->subjectTeacherTermlyUpload->position($studentResult->total)}}</td>
            <td class="text text-center">{{$studentResult->effort()}}</td>
            <td class="text text-center">{{$studentResult->remark()}}</td>
        </tr>
    @endforeach
    <table class="table-bordered">
    <tr>
        <td width="200"><b>Total Marks:</b></td>
        <td width="100"><b>{{$subjects*100}}</b></td>
    </tr>
    <tr>
        <td><b>Obtained Marks:</b></td>
        <td colaps="7"><b>{{$obtainedMarks}}</b></td>
    </tr>
    </table>    
    </tbody>
</table>