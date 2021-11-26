<x-app-layout>
    @section('title')
        {{config('app.name')}} register new teacher
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.result.summary.detail.edit',$studentResult)}}
    @endsection
    @section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-header text text-bold"><b>Edit Result</b></div><br>
                    <form action="{{route('dashboard.section.class.subject.result.summary.detail.update',[$studentResult->id])}}" method="post">
                        @csrf
                        <input type="hidden" name="studentResultId" value="{{$studentResult->id}}">
                        <div class="form-group row">
                            <div class="col-md-3"><label for="">Name</label></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" disabled value="{{$studentResult->sectionClassStudent->student->name}}" placeholder="Enter Teacher's Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3"><label for="">Admission NO</label></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" disabled name="admission_no" value="{{$studentResult->sectionClassStudent->student->admission_no}}" placeholder="Enter Teacher's Phone number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"><label for="">CA</label></div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="ca" value="{{$studentResult->ca}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"><label for="">Exam</label></div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="exam" value="{{$studentResult->exam}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"><label for="">Total</label></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="total" disabled value="{{$studentResult->total}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"><label for="">Grade</label></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="grade" disabled value="{{$studentResult->grade}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <button class="btn btn-secondary">Update</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>   
        
    @endsection
    
</x-app-layout>
