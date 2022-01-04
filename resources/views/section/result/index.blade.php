<x-app-layout>
    @section('title')
        sections
    @endsection
    @section('breadcrumb')
       {{Breadcrumbs::render('dashboard')}}
    @endsection
    @section('content')
        <div class="card shadow">
            <div class="card-body">
                <div class="card-header text text-center h4 shadow">{{strtoupper(config('app.name'))}} {{$section->name}} RESULT MANAGEMENT CENTER</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>CLASS</th>
                            <th>UPLOADED RESULT</th>
                            <th>AWAITING RESULT</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($section->sectionClasses as $sectionClass)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sectionClass->name}}</td>
                                <td>
                                <a href="{{route('dashboard.section.class.result.summary',[$sectionClass->id])}}">
                                <button class="btn btn-primary">{{count($sectionClass->subjectResultUploads()['uploaded'])}}</button></a></td>
                                <td><a href="{{route('dashboard.section.result.awaiting',[$sectionClass->id])}}">
                                <button class="btn btn-primary">{{count($sectionClass->subjectResultUploads()['awaiting'])}}</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
    
</x-app-layout>
