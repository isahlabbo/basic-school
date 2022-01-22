<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$sectionClass->name}} view accessment
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
        
        <div class="">
            <form action="">
            <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Head Teacher Comment</label>
                            </div>
                            <div class="col-md-9">
                                <select name="head_techer_comment_id" id="" class="form-control">
                                    <option value="{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->headTeacherComment->id}}">{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->headTeacherComment->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Teacher Comment</label>
                            </div>
                            <div class="col-md-9">
                                <select name="teacher_comment_id" id="" class="form-control">
                                    <option value="{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->teacherComment->id}}">{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->teacherComment->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Days School Open</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="days_school_open" value="{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_school_open}}" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Days Present</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="days_present" id="" value="{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_present}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Days Absent</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="days_absent" value="{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_absent}}" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentAffectiveTraits as $accessmentAffectiveTrait)    
                    <div class="col-md-3 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">{{$accessmentAffectiveTrait->affectiveTrait->name}}</label>
                            </div>
                            <div class="col-md-6">
                                <select name="{{$accessmentAffectiveTrait->affectiveTrait->name}}" id="" class="form-control">
                                    <option value="{{$accessmentAffectiveTrait->value}}">{{$accessmentAffectiveTrait->value}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentPsychomotors as $accessmentPsychomotor)    
                    <div class="col-md-3 form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">{{$accessmentPsychomotor->Psychomotor->name}}</label>
                            </div>
                            <div class="col-md-6">
                                <select name="{{$accessmentPsychomotor->Psychomotor->name}}" id="" class="form-control">
                                    <option value="{{$accessmentPsychomotor->value}}">{{$accessmentPsychomotor->value}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-block btn-success">Update Accessment</button>
                </div>
            </form>
            <br>
            <br>
            <br>
            <br>
        </div>
    @endsection
    
</x-app-layout>
