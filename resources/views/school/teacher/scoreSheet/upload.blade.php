<x-app-layout>
    @section('title')
        {{$sectionClassSubject->subject->name}} result upload
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.teacher.subject.upload',$sectionClassSubject->activeSectionClassSubjectTeacher()->teacher)}}
    @endsection
    @section('content')
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
        <div class="card-header text text-bold"><b>Upload Result of {{$sectionClassSubject->subject->name}} for {{$sectionClassSubject->sectionClass->name}}</b></div><br>
        <form enctype="multipart/form-data" action="{{route('dashboard.teacher.scoresheet.uploadNow',[$sectionClassSubject->id])}}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-3"><label for="">Choose Score Sheet</label></div>
                    <input type="hidden" value="{{$sectionClassSubject->id}}" name="sectionClassSubjectId">
                    <div class="col-md-5">
                        <input type="file" placeholder="choose file" name="score_sheet" id="" class="form-control">
                    </div>
                    <div class="col-md-4">
                    <select name="term" class="form-control" >
                        <option value="">Select Term</option>
                        @foreach($terms as $term)
                        <option value="{{$term->id}}">{{$term->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-secondary">Upload Result</button>
                        </div>
                    </div>    
                </div>    
            </form>
        </div>
    </div>
    </div>
    </div>   
        
    @endsection
    
</x-app-layout>
