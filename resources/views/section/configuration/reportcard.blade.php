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
                        <table class="table-bordered" style="width: 100%; height: 20px;">
                            <thead class="text text-center">
                                <tr>
                                    <th>AFFECTIVE TRAITS</th>
                                    <th><button class="btn btn-primary" data-toggle="modal" data-target="#affectiveTrait">New</button></th>
                                    <th></th>
                                    @include('section.configuration.affectivetrait.register')
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affectiveTraits->where('status',1) as $affectiveTrait)
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
                                                        <th><button class="btn btn-primary" data-toggle="modal" data-target="#psychomotor">New</button></th>
                                                        <th></th>
                                                    </tr>
                                                    @include('section.configuration.psychomotor.register')
                                                </thead>
                                                <tbody>
                                                    @foreach($psychomotors->where('status',1) as $psychomotor)
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
        </div>
    </div>
    </div>
    </div>   
        
    @endsection
    
</x-app-layout>
