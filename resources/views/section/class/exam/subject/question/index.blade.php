<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$sectionClassSubject->subject->name}} exam questions
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="container">
        <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Question</th>
                <th>Question Type</th>
                <th>Options</th>
                <th>Items</th>
                <th>Diagram</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectionClassSubject->questions as $question)
                    <tr>
                        <td>Q. {{$loop->iteration}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->questionType->name}}</td>
                        <td>
                            {{count($question->options)}}
                        </td>
                        <td>
                            {{count($question->questionItems)}}
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#edit_{{$question->id}}" class="btn btn-primary">Edit</button>
                            @include('section.class.exam.subject.question.edit')
                            <a href="{{route('dashboard.section.class.exam.subject.question.view',[$sectionClassSubject->sectionClass->id,$question->id])}}">
                                <button class="btn btn-info">View</button>
                            </a>
                            <a onclick="return confirm('Are you sure you want to delete this question')" href="{{route('dashboard.section.class.exam.subject.question.delete',[$sectionClassSubject->sectionClass->id,$question->id])}}">                            
                               <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endsection    
</x-app-layout>