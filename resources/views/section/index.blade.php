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
                <div class="card-header text text-center h4 shadow">{{config('app.name')}} Registered Sections</div>
                <table class="table">
        <thead>
            <tr>
                <th>S/N</th>
                <th>SECTION</th>
                <th>LEVEL</th>
                <th>DURATION IN YAER</th>
                <th>CLASSES</th>
                <th></th>
                <th><button data-toggle="modal" data-target="#addSection" class="btn btn-primary">ADD SECTION</button></th>
                @include('section.create')
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $section)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$section->name}}</td>
                    <td>{{$section->level}}</td>
                    <td>{{$section->duration}}</td>
                    <td>{{count($section->sectionClasses)}}</td>
                    <td><a href="{{route('dashboard.section.result.index',[$section->id])}}">
                    <button class="btn btn-primary">Manage Result</button></a>
                    </td>
                    <td>
                        <a href="{{route('dashboard.section.view',[$section->id])}}"><button class="btn btn-secondary">
                            VIEW CLASSES
                        </button></a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#section_{{$section->id}}">EDIT</button>
                        @include('section.edit')
                        <a href="{{route('dashboard.section.delete',[$section->id])}}">
                        <button onclick="return confirm('Are you sure, you want to delete this section from this school')" class="btn btn-danger">DELETE</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
            </div>
        </div>
    @endsection
    
</x-app-layout>
