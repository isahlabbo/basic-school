<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$exam->sectionClass->name}} exam subject
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="container">
    <div class="card-header"><h4>{{$exam->sectionClass->name}} {{strtoupper($exam->academicSessionTerm->term->name)}} EXAM SUBJECTS AND QUESTIONS</h4></div>
        <table class="table">
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Question</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($exam->sectionClass->sectionClassSubjects as $sectionClassSubject)
            <tr>
                <td>{{$sectionClassSubject->subject->name}}</td>
                <td>{{count($sectionClassSubject->questions->where('section_class_termly_exam_id',$exam->id))}}</td>
                <td>
                    <a href="{{route('dashboard.section.class.exam.subject.question.paper',[$exam->id, $sectionClassSubject->id])}}">
                        <button class="btn btn-secondary">Question Papers</button>
                    </a>
                    <button data-toggle="modal" data-target="#subject_{{$sectionClassSubject->id}}" class="btn btn-primary">Add Question</button>
                </td>
            </tr>
            @include('section.class.exam.addQuestion')
            @endforeach
        </tbody>
        </table>
    </div>
    @endsection    
</x-app-layout>
