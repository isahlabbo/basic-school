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
                
                <th>FIRST TERM</th>
                <th>SECOND TERM</th>
                <th>THIRD TERM</th>
                <th></th>
                <th><button data-toggle="modal" data-target="#addSubject" class="btn btn-primary">Add Subject</button></th>
                @include('section.class.subject.create')
            </tr>
        </thead>
        <tbody>
            @foreach($sectionClass->sectionClassSubjects as $sectionClassSubject)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassSubject->subject->name}}</td>
                    <td>{{$sectionClassSubject->activeSectionClassSubjectTeacher()->teacher->user->name ?? 'Not Available'}}</td>
                    @if($sectionClassSubject->activeSectionClassSubjectTeacher())
                    <td><a href="{{route('dashboard.section.class.subject.termResult',[$sectionClass->id,$sectionClassSubject->id,'1'])}}">{{count($sectionClassSubject->termlyUpload(1))}}</a></td>
                    <td><a href="{{route('dashboard.section.class.subject.termResult',[$sectionClass->id,$sectionClassSubject->id,'2'])}}">{{count($sectionClassSubject->termlyUpload(2))}}</a></td>
                    <td><a href="{{route('dashboard.section.class.subject.termResult',[$sectionClass->id,$sectionClassSubject->id,'3'])}}">{{count($sectionClassSubject->termlyUpload(3))}}</a></td>
                    @endif
                    <td>
                    @if(count($sectionClassSubject->sectionClassSubjectTeachers) > 0)
                    <a href="{{route('dashboard.section.class.subject.allocation.reCreate',[$sectionClassSubject->activeSectionClassSubjectTeacher()->id])}}"><button class="btn btn-primary">change the teacher</button></a>
                    @else
                        <a href="{{route('dashboard.section.class.subject.allocation.create',[$sectionClassSubject->id])}}"><button class="btn btn-secondary">Add Teacher</button></a>
                    @endif
                    </td>
                    <td>
                    <button data-toggle="modal" data-target="#subject_{{$sectionClassSubject->id}}" class="btn btn-secondary">Edit</button>
                    <a href="{{route('dashboard.section.class.subject.delete',[$sectionClass->id,$sectionClassSubject->id])}}" onclick="return confirm('are sure, you want to delete this subject')"><button  class="btn btn-danger">Delete</button></a></td>
                </tr>
                @include('section.class.subject.edit')
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
