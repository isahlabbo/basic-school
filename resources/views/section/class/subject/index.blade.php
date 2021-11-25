<x-app-layout>
    @section('title')
        {{$sectionClass->name}} subjects
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.section.class.subject',$sectionClass)}}
    @endsection
    @section('content')
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>SUBJECTS</th>
                <th>TEACHER</th>
                <th></th>
                <th><button class="btn btn-primary">Add Subject</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectionClass->sectionClassSubjects as $sectionClassSubject)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassSubject->subject->name}}</td>
                    <td>{{$sectionClassSubject->activeSectionClassSubjectTeacher()->teacher->user->name ?? 'Not Available'}}</td>
                    <td>
                    @if(count($sectionClassSubject->sectionClassSubjectTeachers) > 0)
                    <a href="{{route('dashboard.section.class.subject.allocation.reCreate',[$sectionClassSubject->activeSectionClassSubjectTeacher()->id])}}"><button class="btn btn-primary">change the teacher</button></a>
                    @else
                        <a href="{{route('dashboard.section.class.subject.allocation.create',[$sectionClassSubject->id])}}"><button class="btn btn-secondary">Add Teacher</button></a>
                    @endif
                    </td>
                    <td><button class="btn btn-secondary">Edit</button><button class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
