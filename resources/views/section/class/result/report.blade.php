<x-app-layout>
    @section('title')
        {{config('app.name')}} {{$sectionClass->name}} report card
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
        <div>
        <button class="btn btn-secondary" id="print" onclick="printContent('report');" >Print</button>
        </div>
        <div id="report">
        @foreach($sectionClass->sectionClassStudents->where('status','Active') as $sectionClassStudent)
            @foreach($sectionClassStudent->sectionClassStudentTerms->where('status','Active') as $sectionClassStudentTerm)<br><br>
            <div class="card shadow" style="page-break-inside: avoid; font-size: 17px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <img src="{{asset(config('app.logo'))}}">
                        </div>
                        <div class="col-md-9">
                            <p class="h3 text text-center"><b>{{config('app.title')}}</b></p>
                            <p class="text text-center mb-0 h4">{{config('app.motto')}}</p>
                            <p class="text text-center mb-0 h5">{{config('app.address')}} </p>
                            <p class="text text-center mb-0 h6">{{config('app.contact')}} </p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 text text-center"><hr style="background-color: gray; height: 2px;"><b>REPORT SHEET FOR {{strtoupper($sectionClassStudentTerm->academicSessionTerm->term->name)}} {{$sectionClassStudentTerm->academicSessionTerm->academicSession->name}} ACADEMIC SESSION</b><hr style="background-color: orange; height: 3px;"></div>
                        
                        <div class="col-md-1"></div>
                        <div class="col-md-5 text">
                        <table style="width: 100%">
                        <tr>
                            <td style="width: 150px"><p class="mb-0">Admission No:</p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudent->student->admission_no}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td> <p class="mb-0">Student Name:</p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudent->student->name}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">Sex:</p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudent->student->gender()}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">No in class:</p></td>
                            <td><p class="mb-0 text-right"><b>{{count($sectionClassStudent->sectionClass->sectionClassStudents->where('status','Active'))}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">
                           
                            @if(config('app.nursery_class_position') == true && $sectionClassStudent->sectionClass->section->name == 'NURSERY')
                                Remark:
                            @else
                                Position:
                            @endif
                            </p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudent->sectionClass->studentPosition($sectionClassStudentTerm) ?? 0}}</b></p></b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">Class Average:</p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudent->sectionClass->classAverage($sectionClassStudentTerm->academicSessionTerm->term)}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">Pupils Average:</p></td>
                            <td><p class="mb-0 text-right"><b>{{$sectionClassStudentTerm->studentAverage()}}</b></p></td>
                        </tr>
                        <tr>
                            
                            <td><p class="mb-0">No of subjects:</p></td>
                            <td><p class="mb-0 text-right"><b>{{count($sectionClassStudent->sectionClass->sectionClassSubjects)}}</b></p></td>
                        </tr>
                                 
                        </table>
                        </div>

                        <div class="col-md-3">
                            <p class="mb-0">
                            <tr><td>Next Term Begins:</td> <td><b>{{strtoupper(date('d-M-Y',strtotime($sectionClassStudent->nextSectionClassStudentTerm()->academicSessionTerm->start_at))) ?? 'Not available'}}</b></td></tr></p>
                            <p class="mb-0">Term: <b>{{strtoupper($sectionClassStudentTerm->academicSessionTerm->term->name)}}</b></p>
                            <p class="mb-0">Class: <b>{{$sectionClassStudent->sectionClass->name}}</b></p>
                            <p class="mb-0">Session: <b>{{$sectionClassStudentTerm->academicSessionTerm->academicSession->name}}</b></p>
                            <p class="mb-0"><b>ATTENDANCE:</b></p>
                            <p class="mb-0">
                                <tr>
                                    <td>Days school open:</td>
                                    <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_school_open ?? 0}}</b></td>
                                </tr>
                            </p>
                            <p class="mb-0">
                            <tr>
                                <td>Day(s) Present:</td>
                                <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_present ?? 0}}</b></td>
                            </tr>
                            
                            </p>
                            <p class="mb-0">
                                <tr>
                                    <td>Day(s) Absent:</td>
                                    <td><b>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->days_absent ?? 0}}</b></td>
                                </tr>
                            </p>
                        </div>
                        <div class="col-md-3 text-center">
                            <p class="mb-0 text text-center"></p>
                            @if($sectionClassStudent->student->picture)
                                <img src="{{$sectionClassStudent->student->profileImage()}}" alt="" height="170" width="150" class="rounded">
                            @else
                                <img src="{{asset('assets/images/user.jpg')}}" width="170" height="150" class="rounded" alt="">
                            @endif
                        </div>
                    </div>
                    <!-- result start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%;" class="table-bordered table- table-striped table-hover">
                                <thead class="text text-center table-light">
                                    <tr>
                                        <th>SUBJECT</th>
                                        <th>1ST CA</th>
                                        <th>2ND CA</th>
                                        <th>EXAM</th>
                                        <th>TOTAL</th>
                                        <th>GRADE</th>
                                        <th>POSITION</th>
                                        <th>EFFORT</th>
                                        <th>REMARK</th>
                                    </tr>
                                </thead>
                                <tbody class="m-0">
                                @php
                                    $subjects = 0;
                                    $obtainedMarks = 0;
                                @endphp
                                @foreach($sectionClassStudentTerm->studentResults as $studentResult)
                                    @php
                                        $subjects++;
                                        $obtainedMarks = $obtainedMarks + $studentResult->total;
                                    @endphp
                                    <tr >
                                        <td>{{$studentResult->subjectTeacherTermlyUpload->sectionClassSubjectTeacher->sectionClassSubject->name}}</td>
                                        <td class="text text-center">{{$studentResult->first_ca}}</td>
                                        <td class="text text-center">{{$studentResult->second_ca}}</td>
                                        <td class="text text-center">{{$studentResult->exam}}</td>
                                        <td class="text text-center">{{$studentResult->total}}</td>
                                        <td class="text text-center">{{$studentResult->grade}}</td>
                                        <td class="text text-center">{{$studentResult->subjectTeacherTermlyUpload->position($studentResult->total)}}</td>
                                        <td class="text text-center">{{$studentResult->effort()}}</td>
                                        <td class="text text-center">{{$studentResult->remark()}}</td>
                                    </tr>
                                @endforeach
                                <table class="table-bordered">
                                <tr>
                                    <td width="200"><b>Total Marks:</b></td>
                                    <td width="100"><b>{{$subjects*100}}</b></td>
                                </tr>
                                <tr>
                                    <td><b>Obtained Marks:</b></td>
                                    <td colaps="7"><b>{{$obtainedMarks}}</b></td>
                                </tr>
                                </table>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- result end -->
                    <!-- accessment start -->
                    <br>
                    <div class="row">

                        <!-- effective trait start -->
                        <div class="col-md-5">
                        <table class="table-bordered" style="width: 100%; height: 20px;">
                            <thead class="text text-center">
                                <tr>
                                    <th>AFFECTIVE TRAITS</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentAffectiveTraits as $accessmentTrait)    
                                <tr>
                                    <td>{{$accessmentTrait->affectiveTrait->name}}</td>
                                    <td>{{$accessmentTrait->value}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- effective trait end -->

                        <div class="col-md-1"></div>

                        <!-- psychomotor and rest start -->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <table class="table-bordered" style="width: 100%; height: 20px;">
                                                <thead class="text text-center">
                                                    <tr>
                                                        <th>PSYCHOMOTOR</th>
                                                        <th>RATING</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($sectionClassStudentTerm->sectionClassStudentTermAccessment->sectionClassStudentTermAccessmentPsychomotors as $accessmentPsychomotor)    
                                                <tr>
                                                    <td>{{$accessmentPsychomotor->psychomotor->name}}</td>
                                                    <td>{{$accessmentPsychomotor->value}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                       </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p  class="text-center"><b></b></p>
                                        <table class="table-bordered text-center" style="width: 100%; height: 20px;">
                                            <thead>
                                                <tr>
                                                    <th>SCALE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Excellent</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Good</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Fair</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Poor</td>
                                                </tr>
                                            </tbody>
                                       </table>
                                    </div>
                                    <div class="col-md-6">
                                        <p  class="text-center"><b>KEY TO GRADING</b></p>
                                        <table class="table-bordered text-center" style="width: 100%; height: 20px;">
                                            <tbody>
                                                <tr>
                                                    <td>A</td>
                                                    <td>70-100</td>
                                                </tr>
                                                <tr>
                                                    <td>B</td>
                                                    <td>60-69</td>
                                                </tr>
                                                <tr>
                                                    <td>C</td>
                                                    <td>50-59</td>
                                                </tr>
                                                <tr>
                                                    <td>D</td>
                                                    <td>45-49</td>
                                                </tr>
                                                <tr>
                                                    <td>E</td>
                                                    <td>40-44</td>
                                                </tr>
                                                <tr>
                                                    <td>F</td>
                                                    <td>00-39</td>
                                                </tr>
                                            </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        <!-- psychomotor and rest start -->
                    </div>
                    <!-- accessment end -->

                    <!-- remarks start -->
                    <div class="row">
                    <table >
                        <div class="col-md-12">
                            <tr>
                                <td>FORM TEACHER'S REMARK: </td>
                                <td>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->teacherComment->name ?? 0}}</td>
                            </tr>
                        </div>
                        <div class="col-md-12">
                            <tr>
                                <td style="width: 300px;">HEAD TEACHER'S REMARK:</td>
                                <td>{{$sectionClassStudentTerm->sectionClassStudentTermAccessment->headTeacherComment->name ?? 0}}</td>
                            </tr>
                        </div>
                    </table>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    @endsection
    </div>
</x-app-layout>
