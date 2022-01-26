<x-app-layout>
    @section('title')
        {{$sectionClass->name}} current students
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.section.class',$sectionClass)}}
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
            @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassStudent->student->name}}</td>
                    <td>{{$sectionClassStudent->student->adnission_no}}</td>
                    <td>{{$sectionClassStudent->student->activeSectionClass()->name ?? 'Not Available'}}</td>
                    <td>{{$sectionClassStudent->student->guardian->name}}</td>
                    <td>{{$sectionClassStudent->student->guardian->phone}}</td>
                    <td>{{$sectionClassStudent->student->guardian->email}}</td>
                    <td>{{$sectionClassStudent->student->guardian->address}}</td>
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
    @endsection
    
</x-app-layout>
