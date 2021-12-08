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
                <th>NAME</th>
                <th>ADMISSION NO</th>
                <th>GENDER</th>
                <th>CURRENT CLASS</th>
                <th>GUARDIAN NAME</th>
                <th>GUARDIAN PHONE</th>
                <th>ADDRESS</th>
                <th></th>
                <th>
                    <a href="{{route('dashboard.section.class.admission.number.regenerate',[$sectionClass->id])}}">
                    <button class="btn btn-primary">Re Generate Admission Number</button></a>
                </th>
                <th>
                    <a href="{{route('dashboard.section.class.student.template.download',[$sectionClass->id])}}">
                    <button class="btn btn-primary">Download Template</button></a>
                </th>
                <th>
                <button class="btn btn-primary" data-toggle="modal" data-target="#upload">upload Template</button></a>
                </th>
            </tr>
            @include('section.class.student.upload')
        </thead>
        <tbody>
            @foreach($sectionClass->sectionClassStudents as $sectionClassStudent)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassStudent->student->name}}</td>
                    <td>{{$sectionClassStudent->student->admission_no}}</td>
                    <td>{{$sectionClassStudent->student->gender()}}</td>
                    <td>{{$sectionClassStudent->student->activeSectionClass()->name ?? 'Not Available'}}</td>
                    <td>{{$sectionClassStudent->student->guardian->name}}</td>
                    <td>{{$sectionClassStudent->student->guardian->phone}}</td>
                    <td>{{$sectionClassStudent->student->guardian->email}}</td>
                    <td>{{$sectionClassStudent->student->guardian->address}}</td>
                    <td>
                        
                    </td>
                    <td>
                        <a href="{{route('dashboard.section.class.student.edit',[$sectionClassStudent->student->id])}}">
                            <button class="btn btn-secondary">Edit</button>
                        </a>
                    </td>
                    <td>
<<<<<<< HEAD
                        <a href="{{route('dashboard.section.class.student.delete',[$sectionClassStudent->student->id])}}" onclick="confirm('Are you sure, you want delete this student record')"><button class="btn btn-danger">Delete</button></a>
=======
                        <a href="{{route('dashboard.section.class.student.delete',[$sectionClassStudent->student->id])}}" onclick="return confirm('Are you sure, you want delete this student record')"><button class="btn btn-danger">Delete</button></a>
>>>>>>> effb797dd2c4667d7dec899ed0d8164733225652
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
