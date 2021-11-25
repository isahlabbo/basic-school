<table>
    <thead>
    <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Admission No</th>
        <th>CA</th>
        <th>EXAM</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->user->name }}</td>
            <td>{{ $student->admission_no }}</td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>