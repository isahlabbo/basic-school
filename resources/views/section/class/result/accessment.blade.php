<table>
<thead>
    <tr>
        <th>NAME</th>
        <th>ADMISSION NO</th>
        <th>DAYS SCHOOL OPEN</th>
        <th>DAYS PRESENT</th>
        <th>DAYS ABSENT</th>
        <th>CLASS TEACHER REMARK</th>
        <th>HEAD TEACHER REMARK</th>
        @foreach($affectiveTraits->where('status',1) as $affectiveTrait)
           <th>{{strtoupper($affectiveTrait->name)}}</th>
        @endforeach

        @foreach($psychomotors->where('status',1) as $psychomotor)
           <th>{{strtoupper($psychomotor->name)}}</th>
        @endforeach
        

        
    </tr>
</thead>
<tbody>
    @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
    <tr>
        <td>{{$sectionClassStudent->student->name}}</td>
        <td>{{$sectionClassStudent->student->admission_no}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        @foreach($affectiveTraits->where('status',1) as $affectiveTrait)
           <td></td>
        @endforeach

        @foreach($psychomotors->where('status',1) as $psychomotor)
           <td></td>
        @endforeach

        
    </tr>
    @endforeach
</tbody>
</table>
