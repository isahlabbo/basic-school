<x-app-layout>
    @section('title')
        {{$sectionClassSubjectTeacher->sectionClassSubject->sectionClass->name}} subject teacher assign another one
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.section.class.subject.allocation.reCreate',$sectionClassSubjectTeacher->sectionClassSubject)}}
    @endsection
    @section('content')
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
        <div class="card-header text text-bold"><b>Change <i>{{$sectionClassSubjectTeacher->sectionClassSubject->subject->name}}</i> Subject Teacher of {{$sectionClassSubjectTeacher->sectionClassSubject->sectionClass->name}}</b></div><br>
        <form action="{{route('dashboard.section.class.subject.allocation.register',[$sectionClassSubjectTeacher->id])}}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4"><label for="">Teacher</label></div>
                       <input type="hidden" value="{{$sectionClassSubjectTeacher->sectionClassSubject->id}}" name="sectionClassSubjectId">
                       <input type="hidden" value="{{$sectionClassSubjectTeacher->id}}" name="change">
                        <div class="col-md-8">
                            <select name="teacher" id="" class="form-control">
                                <option value="" >{{$sectionClassSubjectTeacher->sectionClassSubject->activeSectionClassSubjectTeacher()->teacher->user->name}}</option>
                                @foreach($teachers as $teacher)
                                    @if($sectionClassSubjectTeacher->sectionClassSubject->activeSectionClassSubjectTeacher()->teacher->user->id != $teacher->user->id)
                                        <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>    
                </div>
                <div class="form-group row">
                    <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-secondary">Assign Teacher</button>
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
