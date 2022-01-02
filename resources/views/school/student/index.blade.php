<x-app-layout>
    @section('title')
        {{config('app.name')}} students
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.student')}}
    @endsection
    
    @section('content')
        <table class="table table-striped " id="datatable-buttons">
        <thead>
            <tr>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>ADMISSION NO</th>
                <th>GENDER</th>
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
                    <td>
                        @if($student->picture)
                            <img src="{{$student->profileImage()}}" alt="" height="120" width="120" class="rounded">
                        @else
                            <img src="{{asset('assets/images/user.jpg')}}" width="120" height="120" class="rounded" alt="">
                        @endif
                    </td>
                    <td>{{$student->admission_no}}</td>
                    <td>{{$student->gender()}}</td>
                    <td>{{$student->activeSectionClass()->name ?? 'Not Available'}}</td>
                    <td>{{$student->guardian->name}}</td>
                    <td>{{$student->guardian->phone}}</td>
                    <td>{{$student->guardian->email}}</td>
                    <td>{{$student->guardian->address}}</td>
                    <td>
                        
                    </td>
                    <td>
                        <a href="{{route('dashboard.student.edit',[$student->id])}}">
                        <button class="btn btn-secondary">Edit</button></a>
                        <a href="{{route('dashboard.student.delete',[$student->id])}}">
                            <button onclick="return confirm('Are you sure, you want to delete this student record')" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        
    @endsection
    
</x-app-layout>
