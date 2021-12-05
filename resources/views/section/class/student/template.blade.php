<table>
    <thead>
        <tr>
            <th>Guardian Name</th>
            <th>Guardian Phone</th>
            <th>Guardian Email</th>
            <th>Guardian Address</th>
            <th>Student Name</th>
            <th>Date Of Birth</th>
            <th>Gender</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
        <tr>
            <td>{{$sectionClassStudent->student->guardian->name}}</td>
            <td>{{$sectionClassStudent->student->guardian->phone}}</td>
            <td>{{$sectionClassStudent->student->guardian->email}}</td>
            <td>{{$sectionClassStudent->student->guardian->address}}</td>
            <td>{{$sectionClassStudent->student->name}}</td>
            <td>{{$sectionClassStudent->student->date_of_birth}}</td>
            <td>{{$sectionClassStudent->student->gender()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>