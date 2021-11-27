<x-app-layout>
    @section('title')
        {{config('app.name')}} register new teacher
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard.result.student',$student)}}
    @endsection
    @section('content')
        @foreach($student->sectionClassStudents as $sectionClassStudent)
            @foreach($sectionClassStudent->sectionClassStudentTerms->where('status','Active') as $sectionClassStudentTerm)<br><br>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            school logo
                        </div>
                        <div class="col-md-10">
                            <p class="h5 text text-center"><b>Way Foward International Academy</b></p>
                            <p class="text text-center mb-0">Guide us to the right path</p>
                            <p class="text text-center mb-0">Gidan Dikko Sarda Quaters Area, Sokoto. </p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 text text-center"><hr style="background-color: gray; height: 2px;"><b>REPORT SHEET FOR SECOND TERM {{$sectionClassStudentTerm->academicSessionTerm->academicSession->name}} ACADEMIC SESSION</b><hr style="background-color: orange; height: 3px;"></div>
                        
                        <div class="col-md-3 text text-right">
                            <p class="mb-0">Admission No:</p>
                            <p class="mb-0">Student Name:</p>
                            <p class="mb-0">Sex:</p>
                            <p class="mb-0">No in class:</p>
                            <p class="mb-0">Position:</p>
                            <p class="mb-0">Class Average:</p>
                            <p class="mb-0">Pupils Average:</p>
                            <p class="mb-0">No of subjects:</p>
                        </div>

                        <div class="col-md-3">
                            <p class="mb-0"><b>{{$student->admission_no}}</b></p>
                            <p class="mb-0"><b>{{$student->name}}</b></p>
                            <p class="mb-0"><b>Sex:</b></p>
                            <p class="mb-0"><b>{{count($sectionClassStudent->sectionClass->sectionClassStudents->where('status','Active'))}}:</b></p>
                            <p class="mb-0"><b>Position:</b></p>
                            <p class="mb-0"><b>Class Average:</b></p>
                            <p class="mb-0"><b>Pupils Average:</b></p>
                            <p class="mb-0"><b>{{count($sectionClassStudent->sectionClass->sectionClassSubjects)}}</b></p>
                        </div>

                        <div class="col-md-3">
                            <p class="mb-0">Next Term Begins:</p>
                            <p class="mb-0">Term: <b>{{strtoupper($sectionClassStudentTerm->academicSessionTerm->term->name)}}</b></p>
                            <p class="mb-0">Class: <b>{{$sectionClassStudent->sectionClass->name}}</b></p>
                            <p class="mb-0">Session: <b>{{$sectionClassStudentTerm->academicSessionTerm->academicSession->name}}</b></p>
                            <p class="mb-0"><b>ATTENDANCE:</b></p>
                            <p class="mb-0">
                                <tr>
                                    <td>Days school open:</td>
                                    <td><b>0</b></td>
                                </tr>
                            </p>
                            <p class="mb-0">
                            <tr>
                                <td>Day(s) Present:</td>
                                <td><b>0</b></td>
                            </tr>
                            
                            </p>
                            <p class="mb-0">
                                <tr>
                                    <td>Day(s) Absent:</td>
                                    <td><b>0</b></td>
                                </tr>
                            </p>
                        </div>
                        <div class="col-md-3 text-center">
                            <p class="mb-0 text text-center"><b>1st of feb 2021</b></p>
                            <img src="{{asset('assets/images/user.jpg')}}" width="170" height="150" class="rounded" alt="">
                        </div>
                    </div>
                    <!-- result start -->
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%;" class=" table-bordered table- table-striped table-hover">
                                <thead class="text text-center table-dark">
                                    <tr>
                                        <th>SUBJECT</th>
                                        <th>1ST CA</th>
                                        <th>2ND CA</th>
                                        <th>EXAM</th>
                                        <th>TOTAL</th>
                                        <th>GRADE</th>
                                        <th>POSIOTION</th>
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
                                        <td class="text text-center"></td>
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
                                    <th>EFECTIVE TRAITS</th>
                                    <th>RATING</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Punctuality</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Attendance</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Reliability</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Neatness</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Politeness</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Honesty</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Relationship with Pupils</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Self-Control</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Attentiveness</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Perseverance</td>
                                    <td>0</td>
                                </tr>
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
                                                <tr>
                                                    <td>Handwriting</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Games</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Sports</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Drawing & Painting</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Crafts</td>
                                                    <td>0</td>
                                                </tr>
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
                                <td>FORM TEACHER'S REMARKS: </td>
                                <td>shshsssj</td>
                            </tr>
                        </div>
                        <div class="col-md-12">
                            <tr>
                                <td style="width: 300px;">HEAD TEACHER REMARKS:</td>
                                <td>hdddhdddh</td>
                            </tr>
                        </div>
                    </table>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    @endsection
    
</x-app-layout>
