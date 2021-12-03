<x-app-layout>
    @section('title')
        {{$sectionClass->name}}  subjects results
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="card">
    <div class="card-body">
        <div class="card-header h4">{{$sectionClass->name}} Subject Results Information 
        <a href="{{route('dashboard.section.class.result.accessment.download',[$sectionClass->id])}}"><button class="btn btn-secondary">Download Accessment</button></a>
        <button class="btn btn-primary" data-toggle="modal" data-target="#class_{{$sectionClass->id}}">Upload Accessment</button>
        </div>
    </div>
    
    </div>
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>SUBJECTS</th>
                <th></th>
                <th>DOWNLOADS</th>
                <th></th>
                <th>UPLOADS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectionClass->sectionClassSubjects as $sectionClassSubject)
                @include('section.class.result.access')
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$sectionClassSubject->subject->name}}</td>
                    <td>
                        <a href="{{route('dashboard.teacher.download.scoresheet',[$sectionClassSubject->activeSectionClassSubjectTeacher()->id])}}">
                        <button class="btn btn-primary">Download Score Sheet</button>
                        </a>
                    </td>
                    <td><button class="btn btn-success">0</button></td>
                    <td>
                        <a href="{{route('dashboard.teacher.upload.scoresheet',[$sectionClassSubject->activeSectionClassSubjectTeacher()->sectionClassSubject->id])}}"><button class="btn btn-secondary">Upload Result</button></a>
                    </td>
                    <td><button class="btn btn-success">0</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @endsection
    
</x-app-layout>
