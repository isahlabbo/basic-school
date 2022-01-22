<x-app-layout>
    @section('title')
        {{config('app.name')}} report card configuration
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
    <div class="row">
    <div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
        <div class="card-header text text-bold text-center shadow"><b>{{strtoupper(config('app.name'))}} REPORT CARD CONFIGURATION</b></div><br>
        <div class="row">

                        <!-- effective trait start -->
                        <div class="col-md-5">
                        @foreach($sections as $section)
                            <div class="col-md-12">
                            <table class="table-bordered" style="width: 100%; height: 20px;">
                                <thead class="text text-center">
                                    <tr>
                                        <th class="shadow">{{strtoupper($section->name)}} AFFECTIVE TRAITS</th>
                                        <th><button class="btn btn-primary" data-toggle="modal" data-target="#affectiveTrait">New</button></th>
                                        <th></th>
                                        @include('section.configuration.affectivetrait.register')
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($section->affectiveTraits->where('status',1) as $affectiveTrait)
                                    <tr>
                                        <td>{{$affectiveTrait->name}}</td>
                                        <td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#affectiveTrait_{{$affectiveTrait->id}}">Edit</button></td>
                                        <td class="text-center">
                                            <a href="{{route('dashboard.section.configuration.reportcard.affectivetrait.delete',[$affectiveTrait->id])}}">    
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @include('section.configuration.affectivetrait.edit')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12"><br></div>
                        @endforeach
                        </div>
                        <!-- effective trait end -->


                        <!-- psychomotor and rest start -->
                                    <div class="col-md-7">
                                        <div class="row">
                                            @foreach($sections as $section)
                                            <div class="col-md-12">
                                            <table class="table-bordered" style="width: 100%; height: 20px;">
                                                <thead class="text text-center">
                                                    <tr>
                                                        <th class=" shadow">{{strtoupper($section->name)}} PSYCHOMOTOR</th>
                                                        <th><button class="btn btn-primary" data-toggle="modal" data-target="#psychomotor">New</button></th>
                                                        <th></th>
                                                    </tr>
                                                    @include('section.configuration.psychomotor.register')
                                                </thead>
                                                <tbody>
                                                    @foreach($section->psychomotors->where('status',1) as $psychomotor)
                                                        <tr>
                                                            <td>{{$psychomotor->name}}</td>
                                                            <td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#psychomotor_{{$psychomotor->id}}">Edit</button></td>
                                                            <td class="text-center">
                                                            <a href="{{route('dashboard.section.configuration.reportcard.psychomotor.delete',[$psychomotor->id])}}">    
                                                            <button class="btn btn-danger">Delete</button></a>
                                                        </td>
                                                        </tr>
                                                        @include('section.configuration.psychomotor.edit')
                                                    @endforeach
                                            </tbody>
                                       </table>
                                    </div>
                                    <div class="col-md-12"><br></div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p  class="text-center"><b></b></p>
                                        <table class="table-bordered text-center" style="width: 100%; height: 20px;">
                                            <thead>
                                                <tr>
                                                    <th>SCALE</th>
                                                    <th>REMARK</th>
                                                    <th>PERCENT</th>
                                                    <th>GRADE</th>
                                                    <th></th>
                                                    <th><button data-toggle="modal" data-target="#newRemark" class="btn btn-secondary">New Remark</button></th>
                                                    @include('section.configuration.remark.create')
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($remarkScales as $remarkScale)
                                                <tr>
                                                    <td>{{$remarkScale->scale}}</td>
                                                    <td>{{$remarkScale->remark}}</td>
                                                    <td>{{$remarkScale->percent}}</td>
                                                    <td>{{$remarkScale->grade}}</td>
                                                    <td><button data-toggle="modal" data-target="#remark_{{$remarkScale->id}}" class="btn btn-secondary">Edit</button></td>
                                                    <td><a href="{{route('dashboard.section.configuration.reportcard.remark.delete',$remarkScale->id)}}">
                                                    <button onclick="return confirm('Are you sure, you want delete this remark')" class="btn btn-primary">Delete</button></a></td>
                                                </tr>
                                                @include('section.configuration.remark.edit')
                                                @endforeach
                                            </tbody>
                                       </table>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p  class="text-center"><b>KEY TO GRADING</b></p>
                                        <table class="table-bordered text-center" style="width: 100%; height: 20px;">
                                        <thead>
                                            <tr>
                                                <th>GRADE</th>
                                                <th>FROM</th>
                                                <th>TO</th>
                                                <th></th>
                                                <th>
                                                    <button data-toggle="modal" data-target="#newGrade" class="btn btn-secondary">New Grade</button>
                                                </th>
                                                @include('section.configuration.grade.create')
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($gradeScales as $gradeScale)
                                                <tr>
                                                    <td>{{$gradeScale->grade}}</td>
                                                    <td>{{$gradeScale->from}}</td>
                                                    <td>{{$gradeScale->to}}</td>
                                                    <td><button data-toggle="modal" data-target="#grade_{{$gradeScale->id}}" class="btn btn-secondary">Edit</button></td>
                                                    <td><a href="{{route('dashboard.section.configuration.reportcard.grade.delete',$gradeScale->id)}}">
                                                    <button onclick="return confirm('Are you sure, you want delete this grade')" class="btn btn-primary">Delete</button></a></td>
                                                </tr>
                                                @include('section.configuration.grade.edit')
                                            @endforeach
                                        </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        <!-- psychomotor and rest start -->
                    </div>
                    <!-- accessment end -->
        </div>
    </div>
    </div>
    </div>   
        
    @endsection
    
</x-app-layout>
