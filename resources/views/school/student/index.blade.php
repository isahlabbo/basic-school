<x-app-layout>
    @section('title')
        {{config('app.name')}} students
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.student')}}
    @endsection
    @section('content')
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>ADMISSION NO</th>
                <th>CURRENT CLASS</th>
                <th>GUARDIAN NAME</th>
                <th>GUARDIAN PHONE</th>
                <th>GUARDIAN EMAIL</th>
                <th>ADDRESS</th>
                <th></th>
                <th><a href="{{route('dashboard.student.create')}}">
                <button class="btn btn-primary">New Admission</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->adnission_no}}</td>
                    <td>{{$student->activeSectionClass()->name ?? 'Not Available'}}</td>
                    <td>{{$student->guardian->name}}</td>
                    <td>{{$student->guardian->phone}}</td>
                    <td>{{$student->guardian->email}}</td>
                    <td>{{$student->guardian->address}}</td>
                    <td>
                        
                    </td>
                    <td>
                        <button class="btn btn-secondary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{$students->onEachSide(5)->links()}}
    @endsection
    
</x-app-layout>
