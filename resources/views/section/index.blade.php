<x-app-layout>
    @section('title')
        {{$section->name}}
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.section', $section)}}
    @endsection
    @section('content')
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>CLASS</th>
                <th>SUBJECTS</th>
                <th>CURRENT STUDENTS</th>
                <th>REPEATING STUDENTS</th>
                <th>CLASS TEACHER</th>
                <th></th>
                <th></th>
                <th><button class="btn btn-primary">Add Class</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($section->sectionClasses as $sectionClass)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClass->name}}</td>
                    <td><a href="{{route('dashboard.section.class.subject.index',[$sectionClass->id])}}">{{count($sectionClass->sectionClassSubjects)}}</a></td>
                    <td>{{count($sectionClass->sectionClassStudents->where('status','Active'))}}</td>
                    <td>{{count($sectionClass->sectionClassStudents->where('status','Repeat'))}}</td>
                    <td>
                        {{$sectionClass->activeClassTeacher() ? $sectionClass->activeClassTeacher()->teacher->user->name : 'Not available'}}
                    </td>
                    <td><a href="{{route('dashboard.section.class.subject.result',[$sectionClass->id])}}"><button class="btn btn-secondary">{{$sectionClass->name}} RESULT</button></a></td>
                    <td>
                        @if($sectionClass->activeClassTeacher())
                        <a href="{{route('dashboard.section.class-teacher.reCreate',[$sectionClass->activeClassTeacher()->id])}}">
                            <button class="btn btn-warning">Change Class Teacher</button>
                        </a>
                        @else
                            <a href="{{route('dashboard.section.class-teacher.create',[$sectionClass->id])}}">
                            <button class="btn btn-primary">Asign Class Teacher</button></a>
                        @endif
                    </td>
                    <td><button class="btn btn-secondary">Edit</button><button class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
