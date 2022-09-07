<x-app-layout>
    @section('title')
        {{config('app.name')}} students
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.section.class',$sectionClass)}}
    @endsection
    
    @section('content')
    <table class="table table-striped " id="datatable-buttons">
        <thead>
            <tr>
                <th>S/N</th>
                <th>PICTURE</th>
                <th>NAME</th>
                <th>ADM NO</th>
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
            @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if($sectionClassStudent->student->picture)
                            <img src="{{$sectionClassStudent->student->profileImage()}}" alt="" height="120" width="120" class="rounded">
                        @else
                            <img src="{{asset('assets/images/user.jpg')}}" width="120" height="120" class="rounded" alt="">
                        @endif
                    </td>
                    <td>{{$sectionClassStudent->student->name}}</td>
                    <td>{{$sectionClassStudent->student->admission_no}}</td>
                    <td>{{$sectionClassStudent->student->gender->name ?? ''}}</td>
                    <td>{{$sectionClassStudent->student->activeSectionClass()->name ?? 'Not Available'}}</td>
                    <td>{{$sectionClassStudent->currentSessionTerm()->id}}</td>
                    <td>{{$sectionClassStudent->student->guardian->name}}</td>
                    <td>{{$sectionClassStudent->student->guardian->phone}}</td>
                    <td>{{$sectionClassStudent->student->guardian->email}}</td>
                    <td>{{$sectionClassStudent->student->guardian->address}}</td>
                    <td>
                        
                    </td>
                    <td>
                        <a href="{{route('dashboard.section.class.student.letter',[$sectionClassStudent->student->id])}}"><button class="btn btn-success">Admission Letter</button></a>
                        <a href="{{route('dashboard.section.class.student.edit',[$sectionClassStudent->student->id])}}">
                            <button class="btn btn-secondary">Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('dashboard.section.class.student.delete',[$sectionClassStudent->student->id])}}" onclick="return confirm('Are you sure, you want delete this student record')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
</x-app-layout>
