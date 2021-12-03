<table>
    <thead>
    <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Admission No</th>
        <th>1ST CA</th>
        <th>2ND CA</th>
        <th>EXAM</th>
    </tr>
    </thead>
    <tbody>
    
    @foreach($students as $student)
    
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->admission_no }}</td>
            <td>{{rand(10,20)}}</td>
            <td>{{rand(10,20)}}</td>
            <td>{{rand(15,60)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>