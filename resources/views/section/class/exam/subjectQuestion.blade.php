<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$exam->sectionClass->name}} exam question papers
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1"><button class="btn btn-secondary btn-block" id="print" onclick="printContent('report');" >Print</button></div>
    </div><br>
    <div id="report">
    @foreach($exam->sectionClass->sectionClassStudents as $sectionClassStudent)
    <div class="card shadow" style="page-break-inside: avoid;">
        <div class="card-body">
            <div class="row">
                @include('section.class.student.result.reportcard.component.schoolInfo')
            </div>
            <div class="row">
                <div class="col-md-12 text text-center">
                    <hr style="background-color: gray; height: 2px;">
                    <b>{{strtoupper($exam->sectionClass->name)}} {{$sectionClassSubject->subject->name}} QUESTION PAPER FOR {{strtoupper($exam->academicSessionTerm->term->name)}}</b><hr style="background-color: orange; height: 3px;">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    @include('section.class.exam.include.header')
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($exam->questions->where('section_class_subject_id',$sectionClassSubject->id) as $question)
                <div class="col-md-1 text-right">Q {{$loop->iteration}}</div>
                <div class="col-md-10">{{$question->question}}</div>
                <div class="col-md-1"></div>
                @if($question->questionType->name == 'Objectives')
                    <div class="col-md-1 text-right"></div>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach($question->options as $option)
                                <div class="col-md-3">{{$option->name}}. {{$option->value}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                @endif
                <hr>
            @endforeach
            <div class="col-md-12"><br></div>
        </div>  
    </div>
    <br>
    @endforeach
    </div>
    @endsection    
</x-app-layout>
