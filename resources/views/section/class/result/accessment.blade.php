<table>
<thead>
    <tr>
        <th>NAME</th>
        <th>ADMISSION NO</th>
        <th>PUNCTUALITY</th>
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
        <th>CLASS TEACHER REMARK</th>
        <th>HEAD TEACHER REMARK</th>
    </tr>
</thead>
<tbody>
    @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
    <tr>
        <td>{{$sectionClassStudent->student->name}}</td>
        <td>{{$sectionClassStudent->student->admission_no}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(2,5)}}</td>
        <td>{{rand(1,10)}}</td>
        <td>{{rand(1,10)}}</td>
    </tr>
    @endforeach
</tbody>
</table>
