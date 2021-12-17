<table>
<thead>
    <tr>
        <th>NAME</th>
        <th>ADMISSION NO</th>
        <th>PUNCTUALITY</th>
        <th>ATTENDANCE</th>
        <th>RELIABILITY</th>
        <th>NEATNESS</th>
        <th>POLITENESS</th>
        <th>HONESTY</th>
        <th>RELATIONSHIP WITH PUPILS</th>
        <th>SELF CONTROL</th>
        <th>ATTENTIVENESS</th>
        <th>PERSEVERANCE</th>
        <th>HANDWRITING</th>
        <th>GAMES</th>
        <th>SPORT</th>
        <th>DRAWING AND PAINTING</th>
        <th>CRAPTS</th>
        <th>DAYS SCHOOL OPEN</th>
        <th>DAYS PRESENT</th>
        <th>DAYS ABSENT</th>
        <th>CLASS TEACHER REMARK</th>
        <th>HEAD TEACHER REMARK</th>
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</tbody>
</table>
