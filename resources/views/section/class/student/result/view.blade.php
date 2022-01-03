<x-app-layout>
    @section('title')
        {{config('app.name')}} register new teacher
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.result.student',$student)}}
    @endsection
    @section('content')
        @foreach($student->sectionClassStudents as $sectionClassStudent)
            @foreach($sectionClassStudent->sectionClassStudentTerms as $sectionClassStudentTerm)<br><br>
            @if($sectionClassStudentTerm->sectionClassStudentTermAccessment)
                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-1"><button class="btn btn-secondary btn-block" id="print" onclick="printContent('report');" >Print</button></div>
                </div><br>
                <div id="report">
                @include('section.class.student.result.reportcard.view')
                </div>
            @endif
            @endforeach
        @endforeach
    @endsection
    
</x-app-layout>
